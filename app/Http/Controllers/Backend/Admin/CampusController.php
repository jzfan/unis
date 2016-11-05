<?php

namespace App\Http\Controllers\Backend\Admin;

use Illuminate\Http\Request;

use App\Http\Requests\CampusRequest;
use App\Http\Controllers\Controller;
use App\Unis\School\Campus;
use App\Unis\School\School;

class CampusController extends Controller
{
    public function index()
    {
    	$campuses = Campus::with('school')->orderBy('school_id', 'desc')->paginate(config('site.perPage'));
    	return view('backend.campus.index', compact('campuses'));
    }

    public function create(Request $request)
    {
    	$school = School::select('id', 'name')->find($request->input('school_id'));
    	return view('backend.campus.create', compact('school'));
    }

    public function store(CampusRequest $request)
    {
    	Campus::create($request->input());
    	return redirect('/admin/campus')->with('success', '创建成功！');
    }

    public function show($campus)
    {
    	$campus = Campus::with('school')->find($campus);
    	return view('backend.campus.show', compact('campus'));
    }

    public function edit($campus)
    {
    	$campus = Campus::with('school')->find($campus);
    	return view('backend.campus.edit', compact('campus'));
    }

    public function update(CampusRequest $request, Campus $campus)
    {
    	$campus->update($request->input());
    	return redirect('/admin/campus')->with('success', '更新成功！');
    }

    public function delete(Request $request)
    {
    	$campus->delete();
    	return redirect()->back()->with('success', '删除成功！');
    }
}
