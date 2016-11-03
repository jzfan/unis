<?php

namespace App\Http\Controllers\Backend\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Unis\Suplier\Shop;

class ShopController extends Controller
{
    public function index()
    {
    	$shops = Shop::with('canteen.campus.school', 'suplier')->paginate(config('site.perPage'));
    	return view('backend.shop.index', compact('shops'));
    }

    public function show($shop)
    {
        $shop = Shop::with('canteen.school')->where('id', $shop)->first();
    	return view('backend.shop.show', compact('shop'));
    }

    public function create(Request $request)
    {
        $suplier_id = $request->input('suplier_id');
    	return view('backend.shop.create', compact('suplier_id'));
    }

    public function store(ShopRequest $request)
    {
        Shop::create($request->input());
        return view('backend.shop.index')->with('success', '创建成功！');
    }
}
