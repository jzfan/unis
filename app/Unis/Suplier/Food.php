<?php

namespace App\Unis\Suplier;

use Illuminate\Database\Eloquent\Model;
use App\Unis\Traits\PriceAttribute;
use App\Unis\Traits\StatusAttribute;

class Food extends Model
{
	use StatusAttribute;
	
	protected $fillable = ['shop_id', 'name', 'img', 'type', 'description', 'price', 'discount', 'favorite', 'recommend', 'status'];

	protected $appends = ['sale_price'];

    public function shop()
    {
    	return $this->belongsTo(Shop::class);
    }

    public function getSalePriceAttribute()
    {
        return round($this->price/100 * (100 - $this->discount)/100*2)/2*100;
    }

}