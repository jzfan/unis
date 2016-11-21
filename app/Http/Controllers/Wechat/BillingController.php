<?php

namespace App\Http\Controllers\Wechat;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use EasyWeChat\Payment\Order;
use EasyWeChat\Foundation\Application;
use App\Unis\Order\Order as UnisOrder;
use App\Unis\Suplier\Shop;
use App\Unis\User\User;
use App\Unis\Suplier\Food;
use App\Unis\Order\Cart;
use App\Unis\Order\OrderItem;
use Carbon\Carbon;

class BillingController extends Controller
{
	protected $payment;
	protected $user;
	protected $foods;
	protected $order_no;
	protected $subject;
	protected $total;
	protected $appointment_at;

	public function __construct()
	{
		$options = [
		    'app_id' => env('WECHAT_APPID'),
		    'payment' => [
		        'merchant_id'        => env('WECHAT_PAYMENT_MERCHANT_ID'),
		        'key'                => env('WECHAT_PAYMENT_KEY'),
		        'cert_path'          => env('WECHAT_PAYMENT_CERT_PATH'), // XXX: 绝对路径！！！！
		        'key_path'           => env('WECHAT_PAYMENT_KEY_PATH'),      // XXX: 绝对路径！！！！
		    ],
		];
		$app = new Application($options);
 		$this->payment = $app->payment;				
	}

	//初始化参数
	public function init($request)
	{
		$this->user = getWechatUser();
		$this->order_no = $this->createOrderNum();
		$this->foods = $this->getFoods($request);
		$this->subject = join('|', $this->foods->pluck('name')->toArray());
		// $this->total = $this->getTotalFee();
		$this->total = 1;
		$this->appointment_at = $request->time ? Carbon::createFromTimestamp($request->time) : Carbon::now()->addMinutes(30);
	}


    public function balance()
    {
    	return view('wechat.billing.balance');
    }

    public function payPage()
    {
    	return view('wechat.user.pay');
    }

    //生成prepay_id
    protected function createWxOrder()
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
 		// 创建订单
 		 $order = new Order($attributes);
 		 return $this->payment->prepare($order);	
    }

    //供ajax调用，返回参数
    public function wechatPrepay(Request $request)
    {
    	$this->init($request);
    	$result = $this->createWxOrder();
    	\Log::info($result);
		 if ($result->return_code == 'SUCCESS' && $result->result_code == 'SUCCESS')
		 {
		 	//生成订单
		 	$this->createOrder();
			return $this->payment->configForPayment($result->prepay_id);
		 }

		return '生成订单错误！';
    }

    //生成订单入库
    protected function createOrder()
    {
    	$address = $this->user->defaultAddress();

    	\DB::transaction(function() use($address)
    	{
	    	$order = UnisOrder::create([
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

    public function wechatNotify()
    {
    	$response = $this->payment->handleNotify(function($notify, $successful){
    		$order = UnisOrder::where('order_no', $notify->out_trade_no)->orderBy('id', 'desc')->first();

    		if (!$order) { // 如果订单不存在
    		        return 'Order not exist.'; // 告诉微信，我已经处理完了，订单没找到，别再通知我了
		    }
		    // 如果订单存在
		    // 检查订单是否已经更新过支付状态
		    if ($order->paid_at) { // 假设订单字段“支付时间”不为空代表已经支付
		        return true; // 已经支付成功了就不再更新了
		    }
		    // 用户是否支付成功
		    if ($successful) {
		        // 不是已经支付状态则修改为已经支付状态
		        $order->paid_at = time(); // 更新支付时间为当前时间
		        $order->status = 'paid';
		    } else { // 用户支付失败
		        $order->status = 'paid_fail';
		    }
		    $order->save(); // 保存订单
		    return true; // 返回处理完成
    	});
    	return $response;

    }

	protected function createOrderNum()
	{
		return date('ymdHis').$this->user->id;
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
		return $total*100;
	}
}
