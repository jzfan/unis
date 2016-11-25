<?php

namespace App\Unis\Message;

use Illuminate\Database\Eloquent\Model;
use App\Unis\User\User;
use App\Unis\Order\Order;

class Feed extends Model
{
    protected $fillable = ['order_id', 'sender_id', 'receiver_id', 'status', 'type'];

    public function sender()
    {
    	return $this->belongsTo(User::class, 'sender_id', 'id');
    }

    public function receiver()
    {
    	return $this->belongsTo(User::class, 'receiver_id', 'id');
    }

    public function order()
    {
    	return $this->belongsTo(Order::class);
    }
}
