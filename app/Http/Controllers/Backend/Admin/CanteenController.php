<?php

namespace App\Http\Controllers\Backend\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CanteenRequest;
use App\Unis\School\Canteen;
use App\Unis\School\School;

class CanteenController extends Controller
{
    public function index()
    {
    	$canteens = Canteen::with('school')->paginate(config('site.perPage'));
    	return view('backend.canteen.index', compact('canteens'));
    }

    public function show($canteen)
    {
        $canteen = Canteen::with('school', 'shops')->where('id', $canteen)->first();
        return view('backend.canteen.show', compact('canteen'));
    }

    public function create(Request $request)
    {
        $school = School::select('id', 'name')->where('id', $request->input('school_id'))->first();
    	return view('backend.canteen.create', compact('school'));
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
