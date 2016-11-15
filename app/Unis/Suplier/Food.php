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
        return number_format(round($this->price * 2 *(100 - $this->discount)/100)/2, 1);
    }

    public function tagFavorite(Array $favorites_id)
    {
        $this->isFavorite = in_array($this->id, $favorites_id) ? true : false;
    }

    public function tagCart(Array $cart_items_id)
    {
        $this->isInCart = in_array($this->id, $cart_items_id) ? true : false;
    }

    public function tagMe($user)
    {
        $f_ids = $user->favorite->value('id');
        $c_ids = $user->foodsInCart->value('id');
        $this->tagFavorite($f_ids);
        $this->tagFavorite($c_ids);
    }

}