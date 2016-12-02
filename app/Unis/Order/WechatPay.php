<?php

namespace App\Unis\Order;

use Illuminate\Http\Request;
use EasyWeChat\Payment\Order as WechatOrder;
use EasyWeChat\Foundation\Application;
use App\Unis\Order\Order;
use App\Unis\User\User;
use App\Unis\Suplier\Food;
use App\Unis\Order\OrderItem;
use Carbon\Carbon;

class WechatPay
{
	public    $payment;
	public    $merchantPay;
	public    $luckyMoney;
	public    $order_no;
	public    $user;
	protected $foods;
	protected $subject;
	protected $total;
	protected $appointment_at;

	public function __construct(Application $app)
	{
 		$this->payment     = $app->payment;				
 		$this->luckyMoney  = $app->lucky_money;
 		$this->merchantPay = $app->merchant_pay;				
	}

	//初始化支付参数
	public function init4Pay($request)
	{
		$this->user = getWechatUser();
		$this->order_no = $this->createOrderNum();
		$this->foods = $this->getFoods($request);
		$this->subject = join('|', $this->foods->pluck('name')->toArray());
		$this->total = $this->getTotalFee();
		// $this->total = 100;
		$this->appointment_at = $request->time ? Carbon::createFromTimestamp($request->time) : Carbon::now()->addMinutes(30);
	}

	public function init4MerchantPay()
	{
		$this->user = getWechatUser();
		$this->order_no = $this->createOrderNum();
	}


    //生成订单入库
    public function createOrder()
    {
    	$address = $this->user->defaultAddress();

    	\DB::transaction(function() use($address)
    	{
	    	$order = Order::create([
	    		'school_id' => $address->school_id,
	    		'order_no' => $this->order_no,
	    		'type' => 'wxpay',
	    		'subject' => $this->subject,
	    		'user_id' => $this->user->id,
	    		'total' => $this->total,
	    		'campus_id' => $address->campus_id,
	    		'dorm_id' => $address->dorm_id,
	    		'address' => $address->text(),
	    		'status' => 'ordered',
	    		'appointment_at' => $this->appointment_at,
	    	]);
	    	foreach ($this->foods as $food) {
		    	OrderItem::create([
		    		'order_id' => $order->id,
		    		'food_id' => $food->id,
		    		'amount' => $food->num,
		    		'price' => $food->priceAfterDiscount(),
		    	]);

	    	}
    	});

    }

   //生成prepay_id
   public function createWxOrder()
   {
		$attributes = [
		    'trade_type'       => 'JSAPI', // JSAPI，NATIVE，APP...
		    'body'             => $this->subject,
		    'detail'           => json_encode($this->foods),
		    'out_trade_no'     => $this->order_no,
		    'total_fee'        => $this->total,
		    'notify_url'       => env('APP_URL').'wechat/no_ti_fy/',
		    'openid'           => $this->user->wechat_openid,
		];
		// 创建微信订单
		 $order = new WechatOrder($attributes);
		 return $this->payment->prepare($order);	
   }

	protected function createOrderNum()
	{
		return $this->user->id.date('ymdHis');
	}

	protected function getFoods($request)
	{
		$foods_arr = $request->food;
		$food_list = [];
		foreach($foods_arr as $key => $food_arr){

				$food_list[$food_arr['id']] = $food_arr['numb'];
		}
		$foods = Food::whereIn('id', array_keys($food_list))->get();
    	foreach($foods as $key=>$food){
    		$food->num = $food_list[$food->id];
    	}
		if (! $foods){
			abort('400', 'no food');
		}
		return $foods;
	}

	protected function getTotalFee()
	{
		$total = 0;
		foreach ($this->foods as $key => $food) {
    		$price = $food->priceAfterDiscount();
    		$total += $price*$food->num;
		}
		//分
		return $total + 300;
	}

	public function refund()
	{
		$hoursAgo = Carbon::now()->subHours(3);
		\DB::transaction( function () use ($hoursAgo) {
			$orders = Order::where('status', 'paid')->where('paid_at', '<', $hoursAgo)->lockForUpdate()->get();
			foreach ($orders as $order) {
				 $result = $this->payment->refundByTransactionId($order->billing_id, $order->id, $order->total);
				 if ($result->return_code == 'SUCCESS' && $result->result_code == 'SUCCESS')
				 {
				 	$order->update(['status'=>'refund', 'refund_at'=>Carbon::now()]);
				 }
				 \Log::warning($result);
			}
		});
		return 'success';
	}

	public function refundByTransactionId($billing_id)
	{
		\DB::transaction( function () use ($billing_id) {

			 $order = Order::where('billing_id', $billing_id)->lockForUpdate()->first();
			 $result = $this->payment->refundByTransactionId($order->billing_id, $order->id, $order->total);
			 if ($result->return_code == 'SUCCESS' && $result->result_code == 'SUCCESS')
			 {
			 	$order->update(['status'=>'refund', 'refund_at'=>Carbon::now()]);
			 }
			 \Log::warning($result);

		});
		return 'success';
	}

	public function refundByParms($billing_id, $order_no, $total)
	{

		 $result = $this->payment->refundByTransactionId($billing_id, $order_no, $total);
		 if ($result->return_code != 'SUCCESS' || $result->result_code != 'SUCCESS')
		 {
		 	file_put_contents(storage_path('logs/refund.log'), json_encode($result), FILE_APPEND);
		 	return $result;
		 }
		 \Log::warning($result);
		 return true;
	}

	protected function init4LuckyMoney()
	{
		$this->user = getWechatUser();
		$this->order_no = 'W'.$this->createOrderNum();
	}

	public function getLuckyMoney()
	{
		$data = [
		    'mch_billno'       => 'xy123456',
		    'send_name'        => 'Uniserve',
		    're_openid'        => $this->user->wechat_openid,
		    'total_num'        => 1,  //普通红包固定为1，裂变红包不小于3
		    'total_amount'     => 100,  //单位为分，普通红包不小于100，裂变红包不小于300
		    'wishing'          => '祝福语',
		    'client_ip'        => Request::ip(),
		    'act_name'         => '测试活动',
		    'remark'           => '测试备注',
		];

		$this->init4LuckyMoney();
		$result = $luckyMoney->send($data, \EasyWeChat\Payment\LuckyMoney\API::TYPE_NORMAL);
\Log::info($result);
		if ($result === 'success'){
			LuckyMoney::create([
				'billing_id' => $data['mch_billno'],
				'user_id' => $this->user->id,
				'openid' => $data['re_openid'],
				'send_name' => $data['send_name'],
				'total_num' => $data['total_num'],
				'total_amount' => $data['total_amount'],
				'client_ip' => $data['client_ip'],
				'wishing' => $data['wishing'],
				'act_name' => $data['act_name'],
				'remark' => $data['remark'],
			]);
		}
	}
}
