<?php

namespace App\Http\Controllers\Backend\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CanteenRequest;
use App\Unis\School\Canteen;
use App\Unis\School\Campus;

class CanteenController extends Controller
{
    public function index()
    {
    	$canteens = Canteen::with('campus.school')->paginate(config('site.perPage'));
    	return view('backend.canteen.index', compact('canteens'));
    }

    public function show($canteen)
    {
        $canteen = Canteen::with('school', 'shops')->where('id', $canteen)->first();
        return view('backend.canteen.show', compact('canteen'));
    }

    public function create(Request $request)
    {
        $campus = Campus::select('id', 'name')->find($request->input('campus_id'))->first();
    	return view('backend.canteen.create', compact('campus'));
    }

    public function store(CanteenRequest $request)
    {
    	Canteen::create($request->input());
    	return redirect('/admin/canteen')->with('success', '创建成功！');
    }

    public function destroy(Canteen $canteen)
    {
    	$canteen->delete();
    	return redirect()->back()->with('success', '删除成功！');
    }
}
