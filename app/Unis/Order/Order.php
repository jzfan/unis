<?php

namespace App\Unis\Order;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Unis\User\User;
use App\Unis\School\Room;
use App\Unis\Suplier\Food;
use App\Unis\Order\OrderItem;

class Order extends Model
{
	use SoftDeletes;

    protected $fillable = ['billing_id', 'type', 'order_no', 'subject', 'user_id', 'total', 'address', 'status', 'school_id', 'campus_id', 'dorm_id', 'address',
                    'paid_at', 'taken_at', 'delivered_at', 'received_at', 'withdrawed_at', 'appointment_at', 'deliver_id', 'refund_at'
    ];

    protected $dates = ['paid_at', 'taken_at', 'delivered_at', 'received_at', 'withdrawed_at', 'appointment_at', 'deleted_at', 'refund_at'];

    public function orderer()
    {
    	return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function deliver()
    {
    	return $this->belongsTo(User::class, 'deliver_id', 'id');
    }

    public function order_items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function foods()
    {
        return $this->belongsToMany(Food::class, 'order_items', 'order_id', 'food_id');
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
            case 'refund':
                return '已退款';
    		default:
    			return '未知状态码';
    	}
    }
}
