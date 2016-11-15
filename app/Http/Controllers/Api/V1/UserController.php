<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use App\Http\Requests\WechatUserRequest;
use App\Http\Controllers\Controller;
use App\Unis\User\User;
use App\Unis\User\Address;
use \DB;
class UserController extends Controller
{
	public function index()
	{
		return User::all()->take(5);
	}
    public function show($id)
    {
    	$user = User::findOrFail($id);
    	return $user;
    }

    public function store(WechatUserRequest $request)
    {

        $data =  [
                    'role' => 'member', 
                    'name' => $request->nickname, 
                    'avatar' => $request->avatar,
                    'wechat_openid' => $request->id,
                    'email' => $request->email,
                    'phone' => (string)$request->phone,

                ];
        DB::beginTransaction();
        try {
        	$user = User::create($data);
        	Address::create([
        		'user_id' => $user->id,
        		'school_id' => $request->school_id,
        		'campus_id' => $request->campus_id,
        		'dorm_id' => $request->dorm_id,
        		'room_number' => $request->room_number,
        		'status' => '1',
        	]);
            DB::commit();
        } catch (Exception $e){
           DB::rollback();
           throw $e;
        }       
        return 'success';
    }

    public function delete()    
    {
        User::orderBy('id', 'desc')->first()->delete();
        return 'success';
    }

    public function last()    
    {
        return User::orderBy('id', 'desc')->first();
    }
}
