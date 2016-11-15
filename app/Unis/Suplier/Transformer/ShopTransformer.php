<?php

namespace App\Unis\Suplier\Transformer;

use League\Fractal\TransformerAbstract;
use App\Unis\Suplier\Shop;

class ShopTransformer extends TransformerAbstract
{

	protected $availableIncludes = [
	];

	public function transform(Shop $shop)
	{
	    return [
	        'name'   => $shop->name,
	    ];
	}

}