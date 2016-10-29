<?php

namespace App\Unis\Order;

use Illuminate\Database\Eloquent\Model;
use App\Unis\Suplier\Food;
use App\Unis\User\User;

class Cart extends Model
{
    protected $guarded = [];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function food()
    {
    	return $this->belongsTo(Food::class);
    }
}
