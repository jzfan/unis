<?php

namespace App\Http\Controllers\Backend\Admin;

use Illuminate\Http\Request;

use App\Http\Requests\DormRequest;
use App\Http\Controllers\Controller;
use App\Unis\School\Dorm;
use App\DataTables\DormDataTable;

class DormController extends Controller
{
    // public function index()
    // {
    // 	$dorms = Dorm::with('campus.school')->with(['rooms'=>function($q){
    //         $q->withCount('users');
    //     }])->withCount('users')->orderBy('campus_id', 'desc')->paginate(config('site.perPage'));
    // 	return view('backend.admin.dorm.index', compact('dorms'));
    // }

    public function index(DormDataTable $dataTable)
    {
        return $dataTable->render('backend.admin.dorm.index');
    }

    public function show($dorm)
    {
    	$dorm = Dorm::with('campus.school')->find($dorm)->first();
    	return view('backend.admin.dorm.show', compact('dorm'));
    }

    public function destroy(Dorm $dorm)
    {
        if ( 0 == $dorm->rooms->count()){
            $dorm->delete();
            return redirect()->back()->with('success', '删除成功！');
        }
        return redirect()->back()->with('failed', '还有房间，不能删除！');

    	$dorm->delete();
    	return redirect()->back()->with('success', '删除成功！');
    }

    public function edit($dorm)
    {
        $dorm = Dorm::with('campus')->find($dorm);
        return view('backend.admin.dorm.edit', compact('dorm'));
    }

    public function update(DormRequest $request, Dorm $dorm)
    {
        $dorm->update($request->input());
        return redirect('/admin/dorm')->with('success', '更新成功！');
    }
}
