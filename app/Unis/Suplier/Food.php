<?php

namespace App\Unis\Suplier;

use Illuminate\Database\Eloquent\Model;
use App\Unis\Traits\PriceAttribute;
use App\Unis\Traits\StatusAttribute;

class Food extends Model
{
	use StatusAttribute;
	
	protected $fillable = ['shop_id', 'name', 'img', 'type', 'description', 'price', 'discount', 'favorite', 'recommend', 'status'];

	use PriceAttribute;
	
    public function shop()
    {
    	return $this->belongsTo(Shop::class);
    }

}
