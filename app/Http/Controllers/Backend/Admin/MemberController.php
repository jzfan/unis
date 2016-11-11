<?php

namespace App\Http\Controllers\Backend\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Unis\User\User;
use App\DataTables\MemberDataTable;

class MemberController extends Controller
{
	// public function index()
	// {
	// 	$members = User::with('address', 'room.dorm.school')->where('role', 'member')->orderBy('id', 'desc')->paginate(config('site.perPage'));
	// 	return view('backend.admin.member.index', compact('members'));
	// }

	public function index(MemberDataTable $dataTable)
	{
		return $dataTable->render('backend.admin.member.index');
	}

	public function edit(User $member)
	{
		return view('backend.admin.member.edit', compact('member'));
	}

	public function show($member)
	{
		$member = User::with('favorites', 'recommends')->find($member);
		return view('backend.admin.member.show', compact('member'));
	}


    public function store(Request $request)
    {
    	$input = $request->input('id_or_name');
    	$map = is_numeric($input) ? 'id' : 'name';
    	User::where($map, $input)->update([
    			'role' => 'member'
    		]);
    	return redirect()->back()->with('success', '添加成功！');
    }

    public function destroy(User $member)
    {
    	$member->role = 'member';
    	$member->save();
    	// $member->update(['role' => 'member']);
    	return redirect()->back()->with('success', '删除成功!');    	
    }

    public function update(User $member, Request $request)
    {
        $input = $request->input();
        dd($input);
        if (empty($input['password'])){
            unset($input['password']);
        }else{
            $input['password']= bcrypt($input['password']);
        }
        $member->update($input);
        return redirect('/admin/member')->with('success', '更新成功！');
    }
}
