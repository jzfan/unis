<?php

namespace App\Http\Controllers\Backend\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CanteenRequest;
use App\Unis\School\Canteen;
use App\Unis\School\Campus;
use App\DataTables\CanteenDataTable;

class CanteenController extends Controller
{
    // public function index()
    // {
    //     $canteens = Canteen::with('campus.school')->orderBy('id', 'desc')->paginate(config('site.perPage'));
    //     return view('backend.admin.canteen.index', compact('canteens'));
    // }

    public function index(CanteenDataTable $dataTable)
    {
    	return $dataTable->render('backend.admin.dt');
    }

    public function show($canteen)
    {
        $canteen = Canteen::with('school', 'shops')->where('id', $canteen)->first();
        return view('backend.admin.canteen.show', compact('canteen'));
    }

    public function create(Request $request)
    {
        $campus = Campus::with('school')->find($request->campus_id);
    	return view('backend.admin.canteen.create', compact('campus'));
    }

    public function store(CanteenRequest $request)
    {
    	Canteen::create($request->input());
    	return redirect('/admin/canteen')->with('success', '创建成功！');
    }

    public function destroy(Canteen $canteen)
    {
        if ($canteen->shops->count() > 0){
            return redirect()->back()->with('failed', '还有店铺存在，不能删除！');
        }
    	$canteen->delete();
    	return redirect()->back()->with('success', '删除成功！');
    }

    public function edit(Canteen $canteen)
    {
        return view('backend.admin.canteen.edit', compact('canteen'));
    }

    public function update(CanteenRequest $request, Canteen $canteen)
    {
        $canteen->update($request->input());
        return redirect('/admin/canteen')->with('success', '更新成功！');
    }
}
