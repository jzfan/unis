<?php

namespace App\Unis\Order\Transformer;

use League\Fractal\TransformerAbstract;
use App\Unis\Order\Order;
use App\Unis\Suplier\Transformer\FoodItemTransformer;

class OrderTransformer extends TransformerAbstract
{
	protected $availableIncludes = [
	    'foods'
	];

	public function transform(Order $order)
	{
	    return [
	        'id'      => (int) $order->id,
	        'order_no'   => $order->order_no,
	        'orderer' =>  [
	        	'name' => $order->orderer->name,
	        	'phone' => $order->orderer->phone,
	        ],
	        'deliver' => $order->deliver ? [
	        	'name' => $order->deliver->name,
	        	'phone' => $order->deliver->phone,
	        ] : null,
	        'address' => $order->address,
	        'total'   => $order->total/100,
	        'appointment_at' => $order->appointment_at->format('Y/m/d - H:i'),
	        'created_at'        => $order->created_at->format('Y/m/d - H:i'),
	        'status' => $order->status,

	    ];
	}

	public function includeFoods(Order $order)
    {
        $foods = $order->foods;

        return $this->collection($foods, new FoodItemTransformer);
    }
}