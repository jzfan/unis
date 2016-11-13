<?php

namespace App\Http\Controllers\Backend\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Unis\User\User;
use App\Events\AgentCreate;
use App\Events\AgentDelete;

class AgentController extends Controller
{

    public function index()
    {
    	$agents = User::where('role', 'agent')->paginate(config('site.pageSize'));
    	return view('backend.admin.agent.index', compact('agents'));
    }

    public function show(User $agent)
    {
        return view('backend.admin.agent.show', compact('agent'));
    }

    public function edit(User $agent)
    {
        return view('backend.admin.agent.edit', compact('agent'));
    }

    public function store(Request $request)
    {
        $input = $request->input('id_or_name');
        $map = is_numeric($input) ? 'id' : 'name';
        $user = User::where($map, $input)->first();
        switch ($user->role) {
            case 'admin':
                return redirect()->back()->with('failed', '该用户是管理员，不能添加！');
            case 'agent':
                return redirect()->back()->with('failed', '该用户已经是代理了！');
            case 'member':
                $user->role = 'agent';
                $user->save();
                event(new AgentCreate($user));
                return redirect()->back()->with('success', '添加成功！');
            default:
                return redirect()->back()->with('failed', '服务器错误，添加失败！');
        }
  

    }

    public function destroy(User $agent)
    {
    	$agent->role = 'member';
    	$agent->save();
        event(new AgentDelete($agent));
    	// $agent->update(['role' => 'member']);
    	return redirect()->back()->with('success', '删除成功!');    	
    }

    public function update(User $agent, Request $request)
    {
        $input = $request->input();
        if (empty($input['password'])){
            unset($input['password']);
        }else{
            $input['password']= bcrypt($input['password']);
        }
        $agent->update($input);
        return redirect('/admin/agent')->with('success', '更新成功！');
    }
}