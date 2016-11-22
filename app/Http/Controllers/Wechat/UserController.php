<?php

namespace App\Http\Controllers\Wechat;

use Illuminate\Http\Request;

use App\Http\Requests\WechatUserRequest;
use App\Http\Controllers\Controller;
use App\Unis\User\User;
use App\Unis\User\Address;
use \DB;

class UserController extends Controller
{

    public function store(WechatUserRequest $request)
    {
        $wx_user = session('wechat.oauth_user');

        $this->checkExist($wx_user);
        $data =  [
                    'role' => 'member', 
                    'name' => $wx_user->nickname, 
                    'avatar' => $wx_user->avatar,
                    'wechat_openid' => $wx_user->id,
                    'email' => $wx_user->email,
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
        return redirect('/wechat/index');
    }

    public function wxUserInfo()
    {
        $user = session('wechat.oauth_user');
        return ['id'=>$user->id, 'nickname'=>$user->nickname, 'email'=>$user->email, 'avatar'=>$user->avatar];
    }

    public function register(Request $request)
    {
        return view('wechat.user.register');
    }

    public function show()
    {
    	return view('wechat.user.profile');
    }

    public function address()
    {
    	return view('wechat.user.address');
    }

    public function getInfo()
    {
        $user = session('wechat.oauth_user')->toArray();
        return response()->json($user);
    }

    public function info()
    {
        $user = session('wechat.oauth_user');
        return User::where('wechat_openid', $user->id)->first();
    }

    private function checkExist($wx_user)
    {
        if (User::where('wechat_openid', $wx_user->id)->first()){
            abort('403', 'user has already registered');
        }
    }
}
