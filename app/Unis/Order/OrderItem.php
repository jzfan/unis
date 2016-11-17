<?php

namespace App\Unis\Order;

use Illuminate\Database\Eloquent\Model;
use App\Unis\Suplier\Food;

class OrderItem extends Model
{
    protected $fillable = ['order_id', 'food_id', 'amount', 'price', 'order_no'];

    public function food()
    {
    	return $this->belongsTo(Food::class);
    }

}
