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

class BillingController extends BaseController
{
	protected $user;

    public function balance()
    {
    	return view('wechat.billing.balance');
    }

    public function payPage()
    {
    	return view('wechat.user.pay');
    }

    public function wechatPay()
    {
    	$this->user = $this->getWechatUser();

		$options = [
		    // 前面的appid什么的也得保留哦
		    'app_id' => env('WECHAT_APPID'),
		    // ...
		    // payment
		    'payment' => [
		        'merchant_id'        => env('WECHAT_PAYMENT_MERCHANT_ID'),
		        'key'                => env('WECHAT_PAYMENT_KEY'),
		        'cert_path'          => env('WECHAT_PAYMENT_CERT_PATH'), // XXX: 绝对路径！！！！
		        'key_path'           => env('WECHAT_PAYMENT_KEY_PATH'),      // XXX: 绝对路径！！！！
		        'notify_url'         => '/wechat/pay_notify',       // 你也可以在下单时单独设置来想覆盖它
		    ],
		];

		$app = new Application($options);
		$payment = $app->payment;

		$attributes = [
		    'trade_type'       => 'JSAPI', // JSAPI，NATIVE，APP...
		    'body'             => 'iPad mini 16G 白色',
		    'detail'           => 'iPad mini 16G 白色',
		    'out_trade_no'     => '1217752501201407033233368018',
		    'total_fee'        => 1,
		    'notify_url'       => '/wechat/pay_notify', // 支付结果通知网址，如果不设置则会使用配置里的默认地址，我就没有在这里配，因为在.env内已经配置了。
		    // ...
		];
		// 创建订单
		 $order = new Order($attributes);
		 $result = $payment->prepare($order);
		 if ($result->return_code == 'SUCCESS' && $result->result_code == 'SUCCESS')
		 {
		   //生产那个订单后的逻辑
		     \Log::info('生成订单号..'.$data->order_guid);
		     //这一块是以ajax形式返回到页面上。   
		     //用户的体验就是点击【确认支付】，验证码以弹层页面出来了（没错，还需要一个好用的弹层js）。
		     $ajax_data=[
		         'html'         =>   json_encode(\QrCode::size(250)->generate($result['code_url'])),
		         'out_trade_no' =>  $data->order_guid,
		         'price'        =>  $data->price
		     ];
		     return $ajax_data;
		 }else{
		     return back()->withErrors('生成订单错误！');
		 }

    }

    public function wechatNotify()
    {
        $app = new Application(config('wechat'));
		$response = $app->payment->handleNotify(function($notify, $successful){
		    // 使用通知里的 "微信支付订单号" 或者 "商户订单号" 去自己的数据库找到订单
		    $order = 查询订单($notify->transaction_id);
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

    public function afterPaid(Request $request)
    {
    	$user = $this->getWechatUser();

    	$address = User::find($user->id)->defaultAddress();

    	$foods_arr = $request->food;
    	$ids = [];
    	foreach($foods_arr as $food_arr){
    		$ids[] = $food_arr['id'];
    	}

    	$foods = Food::whereIn('id', $ids)->get();

    	if (! $foods){
    		abort('400', 'no food');
    	}
    	$total = 0;
    	foreach($foods as $key=>$food){
    		$price = $food->priceAfterDiscount();
    		$total = $total + $price*$foods_arr[$key]['numb'];
	    	OrderItem::create([
	    		'order_id' => $user->id,
	    		'food_id' => $food->id,
	    		'amount' => $foods_arr[$key]['numb'],
	    		'price' => $price,
	    	]);
    	}
    	// dd($foods->pluck('name')->toArray());
    	// dd($address->text());
    	UnisOrder::create([
    		'school_id' => $address->school_id,
    		'order_no' => $this->makeOrder(),
    		'type' => 'wxpay',
    		'subject' => join('|', $foods->pluck('name')->toArray()),
    		'user_id' => $user->id,
    		'total' => $total,
    		'campus_id' => $address->campus_id,
    		'dorm_id' => $address->dorm_id,
    		'address' => $address->text(),
    		'status' => 'paid',
    		'paid_at' => Carbon::now(),
    		'appointment_at' => Carbon::createFromTimestamp($request->time)
    	]);

    	$carts = Cart::where('user_id', $user->id)->get();
    	foreach($carts as $cart){
    		$cart->delete();
    	}
    	return 'success';
    }

    public function makeOrder()
    {
    	return time().str_random(4);
    }
}
