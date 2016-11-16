<?php

namespace App\Http\Controllers\Backend\Admin;

use Illuminate\Http\Request;

use App\Http\Requests\FoodRequest;
use App\Http\Controllers\Controller;
use App\Unis\Suplier\Food;
use App\Unis\Suplier\Shop;
use App\DataTables\FoodDataTable;
use Image;

class FoodController extends Controller
{
    // public function index()
    // {
    //  $foods = Food::with('shop')->orderBy('id', 'desc')->paginate(config('site.perPerge'));
    //  return view('backend.admin.food.index', compact('foods'));
    // }

    public function index(FoodDataTable $dataTable)
    {
        return $dataTable->render('backend.admin.food.index');
    }

    public function show(Food $food)
    {
        return view('backend.admin.food.show', compact('food'));
    }

    public function edit(Food $food)
    {
        // dd($food);
        return view('backend.admin.food.edit', compact('food'));
    }

    public function update(FoodRequest $request, Food $food)
    {
        $food->update($request->input());
        $next = Food::where('id','>',$food->id)->orderBy('id', 'asc')->first();
        return redirect('/admin/food/'.$next->id.'/edit');
    }

    public function destroy(Food $food)
    {
        $food->delete();
        return redirect()->back()->with('success', '删除成功！');
    }

    public function create(Request $request)
    {
        $shop = Shop::select('id', 'name')->where('id', $request->input('shop_id'))->first();
        return view('backend.admin.food.create', compact('shop'));
    }

    public function store(Request $request)
    {
        Food::create($request->input());
        return redirect('/admin/food')->with('success', '新增成功！');
    }

    public function uploadImg(Request $request)
    {

        $img = Image::make($request->file);

        $filename_ext = time().str_random(2).'.jpg';
        $img->encode('jpg')->save(public_path(config('site.foodImgPath')). $filename_ext);
        // echo  config('site.foodImgPath').$filename_ext;
        return config('site.foodImgPath').$filename_ext;
    }
}
