<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Unis\Suplier\Shop;

class ShopController extends Controller
{
    public function index()
    {
    	$shops = Shop::with('canteen.school', 'canteen', 'suplier')->paginate(config('site.perPage'));
    	return view('backend.shop.index', compact('shops'));
    }

    public function show(Shop $shop)
    {
    	return view('backend.shop.show', compact('shop'));
    }

    public function create()
    {
    	return view('backend.shop.create');
    }
}
