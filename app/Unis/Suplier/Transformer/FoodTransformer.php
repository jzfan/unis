<?php

namespace App\Unis\Suplier\Transformer;

use League\Fractal\TransformerAbstract;
use App\Unis\Suplier\Food;

class FoodTransformer extends TransformerAbstract
{
	public function transform(Food $food)
	{
	    return [
	        'id'      => (int) $food->id,
	        'name'   => $food->name,
	        'price'  => number_format(round($food->price * (100 - $food->discount)/100), 1),
	        'original_price' => number_format($food->price, 1),
	        'img' => $food->img,
	        'sold' => $food->sold
	    ];
	}
}