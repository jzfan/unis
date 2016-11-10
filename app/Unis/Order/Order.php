<?php

namespace App\Unis\Order;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Unis\User\User;
use App\Unis\School\Room;

class Order extends Model
{
	use SoftDeletes;

    protected $fillable = ['billing_id', 'type', 'order_no', 'subject', 'user_id', 'total', 'address', 'status'];

    protected $dates = ['paid_at', 'taken_at', 'delivered_at', 'withdrawed_at', 'deleted_at'];

    public function orderer()
    {
    	return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function deliver()
    {
    	return $this->belongsTo(User::class, 'deliver_id', 'id');
    }


    public function getStatusAttribute($value)
    {
    	switch ($value) {
    		case 'ordered':
    			return '已下单';
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
 
    		default:
    			return '未知状态码';
    	}
    }
}
