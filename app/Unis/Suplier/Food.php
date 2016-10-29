<?php

namespace App\Unis\Suplier;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
	protected $guarded = [];

    public function shop()
    {
    	return $this->belongsTo(Shop::class);
    }
}
