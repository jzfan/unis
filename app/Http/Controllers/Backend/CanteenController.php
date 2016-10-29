<?php

namespace App\Http\Controllers\Backend;

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

    public function create()
    {
    	$schools = School::select('id', 'name')->get();
    	return view('backend.canteen.create', compact('schools'));
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
