<?php
namespace App\Http\Controllers\Backend\Admin;

use Illuminate\Http\Request;

use App\Http\Requests\CampusRequest;
use App\Http\Controllers\Controller;
use App\Unis\School\Campus;
use App\Unis\School\School;
use App\DataTables\CampusDataTable;

class CampusController extends Controller
{
    // public function index()
    // {
    // 	$campuses = Campus::with('school')->orderBy('school_id', 'desc')->paginate(config('site.perPage'));
    // 	return view('backend.admin.campus.index', compact('campuses'));
    // }

    public function index(CampusDataTable $dataTable)
    {
        return $dataTable->render('backend.admin.campus.index');
    }

    public function create(Request $request)
    {
    	$school = School::select('id', 'name')->find($request->input('school_id'));
    	return view('backend.admin.campus.create', compact('school'));
    }

    public function store(CampusRequest $request)
    {
    	Campus::create($request->input());
    	return redirect('/admin/campus')->with('success', '创建成功！');
    }

    public function show($campus)
    {
    	$campus = Campus::with('school')->find($campus);
    	return view('backend.admin.campus.show', compact('campus'));
    }

    public function edit($campus)
    {
    	$campus = Campus::with('school')->find($campus);
    	return view('backend.admin.campus.edit', compact('campus'));
    }

    public function update(CampusRequest $request, Campus $campus)
    {
    	$campus->update($request->input());
    	return redirect('/admin/campus')->with('success', '更新成功！');
    }

    // public function delete(Request $request)
    // {
    // 	$campus->delete();
    // 	return redirect()->back()->with('success', '删除成功！');
    // }

    public function destroy(Campus $campus)
    {
        if ($campus->dorms->count() > 0 || $campus->canteens->count() > 0){
            return redirect()->back()->with('failed', '还有食堂|宿舍存在，不能删除！');
        }
        $campus->delete();
        return redirect()->back()->with('success', '删除成功！');
    }
}
