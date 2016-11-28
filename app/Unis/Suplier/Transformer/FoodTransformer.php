<?php

namespace App\Unis\Suplier\Transformer;

use League\Fractal\TransformerAbstract;
use App\Unis\Suplier\Food;

class FoodTransformer extends TransformerAbstract
{

	protected $availableIncludes = [
	    'shop'
	];

	public function transform(Food $food)
	{
	    return [
	        'id'      => (int) $food->id,
	        'name'   => $food->name,
	        'price'  => $food->priceAfterDiscount(),
	        'original_price' => number_format($food->price, 1),
	        'img' => $food->img,
	        'sold' => $food->sold,
	        'canteen' => $food->shop->canteen->name
	    ];
	}

	public function includeShop(Food $food)
    {
    	$shop = $food->shop;

        return $this->item($shop, new ShopTransformer);
    }
}