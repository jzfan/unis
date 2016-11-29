<?php

namespace App\Http\Controllers\Backend\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Unis\Order\Order;
use App\DataTables\OrderDataTable;

class OrderController extends Controller
{
    // public function index()
    // {
    // 	$orders = Order::with('orderer', 'deliver')->paginate(config('site.perPage'));
    // 	return view('backend.admin.order.index', compact('orders'));
    // }

    public function index(OrderDataTable $dataTable)
    {
        return $dataTable->render('backend.admin.order.index');
    }

    public function show($order)
    {
    	$order = Order::with('foods', 'orderer', 'deliver')->find($order);
    	return view('backend.admin.order.show', compact('order'));
    }
}
