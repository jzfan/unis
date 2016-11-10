<?php

namespace App\Http\Controllers\Backend\Admin;

use Illuminate\Http\Request;

use App\Http\Requests\ShopRequest;
use App\Http\Controllers\Controller;
use App\Unis\Suplier\Shop;
use App\Unis\School\Canteen;
use App\DataTables\ShopDataTable;

class ShopController extends Controller
{
    // public function index()
    // {
    //     $shops = Shop::with('canteen.campus.school', 'suplier')->orderBy('id', 'desc')->paginate(config('site.perPage'));
    //     return view('backend.admin.shop.index', compact('shops'));
    // }    

    public function index(ShopDataTable $dataTable)
    {
    	return $dataTable->render('backend.admin.shop.index');
    }

    public function show($shop)
    {
        $shop = Shop::with('canteen.school')->where('id', $shop)->first();
    	return view('backend.admin.shop.show', compact('shop'));
    }

    public function create(Request $request)
    {
        $suplier_id = $request->suplier_id;
        if ($suplier_id){
            return view('backend.admin.shop.createBySuplier', compact('suplier_id'));
        }
        $canteen = Canteen::with('campus.school')->find($request->canteen_id);
        return view('backend.admin.shop.createBySchool', compact('canteen'));
    }

    public function store(ShopRequest $request)
    {
        Shop::create($request->input());
        return redirect('/admin/shop')->with('success', '创建成功！');
    }

    public function destroy(Shop $shop)
    {
        $shop->foods()->delete();
        $shop->delete();
        return redirect()->back()->with('success', '删除成功！');
    }

    public function edit($shop)
    {
        $shop = Shop::with('canteen.campus.school')->find($shop);
        return view('backend.admin.shop.edit', compact('shop'));
    }

    public function update(ShopRequest $request, Shop $shop)
    {
        $shop->update($request->input());
        return redirect('/admin/shop')->with('success', '更新成功！');
    }
}
