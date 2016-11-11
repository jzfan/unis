<?php

namespace App\Http\Controllers\Backend\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Unis\User\User;
use App\Events\AgentCreate;

class AgentController extends Controller
{

    public function index()
    {
    	$agents = User::with('address')->where('role', 'agent')->paginate(config('site.pageSize'));
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
    	$user = User::where($map, $input)->update([
    			'role' => 'agent'
    		]);
        dd($user);
        event(new AgentCreate());
    	return redirect()->back()->with('success', '添加成功！');
    }

    public function destroy(User $agent)
    {
    	$agent->role = 'member';
    	$agent->save();
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