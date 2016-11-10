<?php

namespace App\Http\Controllers\backend\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Unis\User\User;

class UserController extends Controller
{
    protected $role;

    public function index()
    {
    	$users = User::with('address')->where('role', $this->role)->paginate(config('site.pageSize'));
    	return view('backend.admin.'.$this->role.'.index', compact($users));
    }

    public function show(User $user)
    {
        return view('backend.admin.'.$this->role.'.show', compact($users));
    }

    public function edit(User $user)
    {
        return view('backend.admin.'.$this->role.'.edit', compact($users));
    }

    public function store(Request $request)
    {
    	$input = $request->input('id_or_name');
    	$map = is_numeric($input) ? 'id' : 'name';
    	User::where($map, $input)->update([
    			'role' => $this->role
    		]);
    	return redirect()->back()->with('success', '添加成功！');
    }

    public function destroy(User $user)
    {
    	$user->role = 'member';
    	$user->save();
    	// $user->update(['role' => 'member']);
    	return redirect()->back()->with('success', '删除成功!');    	
    }

    public function update(User $user, Request $request)
    {
        $input = $request->input();
        if (empty($input['password'])){
            unset($input['password']);
        }else{
            $input['password']= bcrypt(123123);
        }
        $user->update($input);
        return redirect('/admin/'.$this->role)->with('success', '更新成功！');
    }
}
