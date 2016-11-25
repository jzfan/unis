<?php

namespace App\Http\Controllers\Wechat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Unis\Order\Order;
use App\Unis\Order\WechatPay;

class BillingController extends Controller
{
    public function balance()
    {
    	return view('wechat.billing.balance');
    }

    //供ajax调用，返回参数
    public function wechatPrepay(Request $request, WechatPay $wechatPay)
    {
    	$wechatPay->init4Pay($request);
    	$result = $wechatPay->createWxOrder();
    	\Log::info($result);
		 if ($result->return_code == 'SUCCESS' && $result->result_code == 'SUCCESS')
		 {
		 	//生成订单
		 	$wechatPay->createOrder();
			return $wechatPay->payment->configForPayment($result->prepay_id);
		 }

		return '生成订单错误！';
    }


    public function wechatNotify(WechatPay $wechatPay)
    {
    	$response = $wechatPay->payment->handleNotify(function($notify, $successful){
    		$order = Order::where('order_no', $notify->out_trade_no)->orderBy('id', 'desc')->first();

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
		        $order->billing_id = $notify->transaction_id;
		    } else { // 用户支付失败
		        $order->status = 'paid_fail';
		    }
		    $order->save(); // 保存订单
		    return true; // 返回处理完成
    	});
    	return $response;

    }

}
