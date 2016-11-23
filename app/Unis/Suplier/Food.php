<?php

namespace App\Unis\Suplier;

use Illuminate\Database\Eloquent\Model;
use App\Unis\Traits\PriceAttribute;
use App\Unis\Traits\StatusAttribute;

class Food extends Model
{
	use StatusAttribute;
	
	use PriceAttribute;
	
	protected $fillable = ['shop_id', 'name', 'img', 'type', 'description', 'price', 'discount', 'favorite', 'recommend', 'status'];

	
    public function shop()
    {
    	return $this->belongsTo(Shop::class);
    }

    public function getTypeAttribute($value)
    {
    	if ($value == null){
    		$value = '';
    	}
    	return $value;
    }

    public function priceAfterDiscount()
    {
        return round($this->price * (100 - $this->discount)/100*2)/2*100;
    }

}