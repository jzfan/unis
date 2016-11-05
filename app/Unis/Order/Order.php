<?php

namespace App\Unis\Order;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['billing_id', 'type', 'order_no', 'subject', 'user_id', 'total', 'address', 'status'];

    protected $dates = ['paid_at'];


}
