<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests\FoodRequest;
use App\Http\Controllers\Controller;
use App\Unis\Suplier\Food;

class FoodController extends Controller
{
    public function index()
    {
    	$foods = Food::with('shop')->paginate(config('site.perPerge'));
    	return view('backend.food.index', compact('foods'));
    }

    public function show(Food $food)
    {
    	return view('backend.food.show', compact('food'));
    }

    public function edit(Food $food)
    {
    	// dd($food);
    	return view('backend.food.edit', compact('food'));
    }

    public function update(FoodRequest $request, Food $food)
    {
    	$food->update($request->input());
    	return redirect('/admin/food')->with('success', '更新成功！');
    }

    public function destroy(Food $food)
    {
    	$food->delete();
    	return redirect()->back()->with('success', '删除成功！');
    }
}
