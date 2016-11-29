<?php

namespace App\Unis\Suplier\Transformer;

use League\Fractal\TransformerAbstract;
use App\Unis\Suplier\Food;

class FoodItemTransformer extends TransformerAbstract
{

	public function transform(Food $food)
	{
	    return [
	        'id'      => (int) $food->id,
	        'name'   => $food->name,
	        'price'  => number_format($food->pivot->price/100, 1),
	        'quantity'  => $food->pivot->quantity,
	        'original_price' => number_format($food->price/100, 1),
	        'img' => $food->img,
	        'sold' => $food->sold,
	        'canteen' => $food->shop->canteen->name
	    ];
	}

}