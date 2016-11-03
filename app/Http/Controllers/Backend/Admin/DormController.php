<?php

namespace App\Http\Controllers\Backend\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Unis\School\Dorm;

class DormController extends Controller
{
    public function index()
    {
    	$dorms = Dorm::with('campus.school')->orderBy('campus_id')->paginate(config('site.perPage'));
    	return view('backend.dorm.index', compact('dorms'));
    }

    public function show($dorm)
    {
    	$dorm = Dorm::with('campus.school')->find($dorm)->first();
    	return view('backend.dorm.show', compact('dorm'));
    }

    public function destroy(Dorm $dorm)
    {
    	$dorm->delete();
    	return redirect()->back()->with('success', '删除成功！');
    }
}
