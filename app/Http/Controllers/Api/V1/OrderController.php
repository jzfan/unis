<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Unis\Order\Order;

class OrderController extends BaseController
{
    public function index()
    {
    	$campus = $this->user->defaultAddress()->campus;
        return Order::where('campus_id', $campus->id)->with('order_items.food.shop.canteen', 'orderer')
                            ->where('status', 'ordered')->orderBy('created_at', 'asc')->simplePaginate(config('site.perPage'));
    }
}
