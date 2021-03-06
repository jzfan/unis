<?php

namespace App\Http\Controllers\Backend\Admin;

use Illuminate\Http\Request;

use App\Http\Requests\SuplierRequest;
use App\Http\Controllers\Controller;
use App\Unis\Suplier\Suplier;

class SuplierController extends Controller
{
    public function index()
    {
    	// $supliers = Suplier::orderBy('id', 'desc')->paginate(config('site.perPage'));
        // return view('backend.admin.suplier.index', compact('supliers'));
    	return view('backend.admin.suplier.index');
    }

    public function show($suplier)
    {
    	$suplier = Suplier::where('id', $suplier)->with('shops.canteen.campus.school')->first();

    	// dd($suplier->shops[0]->school->name);

    	return view('backend.admin.suplier.show', compact('suplier'));
    	
    }

    public function create()
    {
    	return view('backend.admin.suplier.create');
    }

    public function store(SuplierRequest $request)
    {
    	Suplier::create($request->input());
    	return redirect('/admin/suplier')->with('success', '添加成功！');
    }

    public function edit(Suplier $suplier)
    {
    	return view('backend.admin.suplier.edit', compact('suplier'));
    }

    public function update(Suplier $suplier, SuplierRequest $request)
    {
    	$suplier->update($request->input());

    	return redirect('/admin/suplier');
    }

    public function destroy(Suplier $suplier)
    {
        if ($suplier->shops->count() > 0){
            return redirect()->back()->with('failed', '还有店面存在，不能删除！');
        }
    	$suplier->delete();
    	return redirect()->back()->with('success', '删除成功!');
    }
}
