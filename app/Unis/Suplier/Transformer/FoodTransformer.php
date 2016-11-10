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
	        'price'  => number_format(round($food->price * (100 - $food->discount)/100), 2),
	        'original_price' => $food->price,
	        'img' => $food->img,
	        'sold' => $food->sold
	    ];
	}
}