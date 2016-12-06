<?php

namespace App\Unis\Order;

use App\Unis\User\User;
use App\Unis\Suplier\Food;
use App\Unis\School\Canteen;
use App\Unis\Order\OrderItem;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['billing_id', 'type', 'order_no', 'subject', 'user_id', 'total', 'address', 'status', 'school_id', 'campus_id', 'dorm_id', 'address',
                    'paid_at', 'taken_at', 'delivered_at', 'received_at', 'withdrawed_at', 'appointment_at', 'deliver_id', 'refund_at'
    ];

    protected $dates = ['paid_at', 'taken_at', 'delivered_at', 'received_at', 'withdrawed_at', 'appointment_at', 'refund_at'];

    public function orderer()
    {
    	return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function deliver()
    {
    	return $this->belongsTo(User::class, 'deliver_id', 'id');
    }

    public function canteens()
    {
        return $this->belongsToMany(Canteen::class);
    }

    public function foods()
    {
        return $this->belongsToMany(Food::class, 'order_items', 'order_id', 'food_id')->withPivot('quantity', 'price');
    }

    public function getStatusAttribute($value)
    {
    	switch ($value) {
    		case 'ordered':
    			return '未付款';
    		case 'paid':
    			return '已付款';
     		case 'paid_fail':
    			return '付款失败';
     		case 'taken':
    			return '配送中';
     		case 'delivered':
    			return '已送达';
     		case 'withdrawed':
    			return '已提现';
            case 'received':
                return '已收到';
            case 'pending':
                return '审核中';
            case 'refund':
                return '已退款';
    		default:
    			return '未知状态码';
    	}
    }

//清除3小时以上未被接单的订单
    public static function clearNotPay()
    {
        $hoursAgo = \Carbon\Carbon::now()->subHours(3);
        \DB::transaction(function() use($hoursAgo) {
            $ids = self::where('status', 'ordered')->where('created_at', '<', $hoursAgo)->lockForUpdate()->pluck('id')->toArray();
            self::destroy($ids);
            OrderItem::whereIn('order_id', $ids)->delete();
            \DB::table('canteen_order')->destroy($ids);
        });
        return 'success';
    }

//送货员确认送达后3个小时自动为买方确认收货
    public static function confirmReceived()
    {

    }

    public function isDeliveredBy(User $user)
    {
        return $this->deliver_id === $user->id;
    }
}
