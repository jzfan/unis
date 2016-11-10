<?php

namespace App\Http\Controllers\Backend\Admin;

use Illuminate\Http\Request;

use App\Http\Requests\SchoolRequest;
use App\Http\Controllers\Controller;
use App\Unis\School\School;
use Lvht\GeoHash;

class SchoolController extends Controller
{
    public function index()
    {
    	$schools = School::orderBy('id', 'desc')->paginate(config('site.perPage'));
    	return view('backend.admin.school.index', compact('schools'));
    }

    public function show($school)
    {
        $school = School::with('campuses')->find($school);
    	return view('backend.admin.school.show', compact('school'));
    }

    public function create()
    {
    	return view('backend.admin.school.create');
    }

    public function store(SchoolRequest $request)
    {
    	$data = mapRegionFrom($request);
    	School::create($data);
    	return redirect('/admin/school')->with('success', '添加成功！');
    }

    public function edit(School $school)
    {
    	$region = implode('/', [$school->province, $school->city, $school->block]);
    	return view('backend.admin.school.edit', compact('school', 'region'));
    }

    public function update(School $school, SchoolRequest $request)
    {
    	$data = mapRegionFrom($request);
    	$school->update($data);
    	return redirect('/admin/school')->with('success', '更新成功');
    }

    public function destroy(School $school)
    {
        if ($school->campuses->count() > 0){
            return redirect()->back()->with('failed', '还有校区存在，不能删除！');
        }
    	$school->delete();
    	return redirect()->back()->with('success', '删除成功！');
    }

}
