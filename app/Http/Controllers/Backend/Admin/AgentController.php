<?php

namespace App\Http\Controllers\Backend\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Unis\User\User;

class AgentController extends Controller
{
    public function index()
    {
    	$agents = User::with('address')->where('role', 'agent')->paginate(config('site.pageSize'));
    	return view('backend.agent.index', compact('agents'));
    }

    public function show(User $agent)
    {
        return view('backend.agent.show', compact('agent'));
    }

    public function store(Request $request)
    {
    	$input = $request->input('id_or_name');
    	$map = is_numeric($input) ? 'id' : 'name';
    	User::where($map, $input)->update([
    			'role' => 'agent'
    		]);
    	return redirect()->back()->with('success', '添加成功！');
    }

    public function destroy(User $agent)
    {
    	$agent->role = 'member';
    	$agent->save();
    	// $agent->update(['role' => 'member']);
    	return redirect()->back()->with('success', '删除成功!');    	
    }
}
