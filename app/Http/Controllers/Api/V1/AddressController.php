<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use App\Http\Requests\AddressRequest;
use App\Http\Controllers\Controller;
use App\Unis\User\User;
use App\Unis\User\Address;
use \DB;

class AddressController extends BaseController
{
 /**
 * @apiDefine UserNotFoundError
 * @apiError UserNotFound  这个<code>openid</code> 的用户未找到.
 * @apiErrorExample 错误返回:
 * HTTP/1.1 401 Unauthorized
 * {
 *    "message": "Unauthorized action.",
 *    "status_code": 401
 * }
 **/

 /**
 * @api {get} /address?openid=xxx 取该用户所有地址
 * @apiVersion 1.0.0
 * @apiName getAddress
 * @apiGroup Address
 * @apiParam {String} openid 微信用户openid
 *
 * @apiSuccessExample 成功返回:
 *     HTTP/1.1 200 OK
     [
       {
         "text": "江汉大学北区南1宿舍11",
         "id": 1,
         "school_id": 2,
         "campus_id": 4,
         "dorm_id": 1,
         "room_number": "11",
         "status": "1"
       }
     ]
 *
 * @apiUse UserNotFoundError
 */
    public function index()
    {
    	$all = User::find($this->user->id)->addresses;
        foreach($all as $key=>$obj){
            $data[$key]['text'] = $obj->text();
            $data[$key]['id'] = $obj->id;
            $data[$key]['school_id'] = $obj->school_id;
            $data[$key]['campus_id'] = $obj->campus_id;
            $data[$key]['dorm_id'] = $obj->dorm_id;
            $data[$key]['room_number'] = $obj->room_number;
            $data[$key]['status'] = $obj->status;
        }
        return $data;
    }

    /**
     * @api {get} /address/default?openid=xxx 取该用户默认地址文本字符
     * @apiVersion 1.0.0
     * @apiName getDefault
     * @apiGroup Address
     * @apiParam {String} openid 微信用户openid
     *
     * @apiSuccessExample 成功返回:
     * HTTP/1.1 200 OK
     * 江汉大学北区南1宿舍11
     *
     * @apiUse UserNotFoundError
     */
    public function getDefault()
    {
    	$default = User::findOrFail($this->user->id)->defaultAddress()->text();
    	return $default;
    }

    /**
     * @api {get} /address/me?openid=xxx 取该用户默认地址数组
     * @apiVersion 1.0.0
     * @apiName getDefaultArr
     * @apiGroup Address
     * @apiParam {String} openid 微信用户openid
     *
     * @apiSuccessExample 成功返回:
     * HTTP/1.1 200 OK
     * {
          "address": {
            "id": 1,
            "user_id": 2,
            "school_id": 2,
            "campus_id": 4,
            "dorm_id": 1,
            "room_number": "11",
            "mark": null,
            "status": "1",
            "created_at": "2016-11-16 17:53:58",
            "updated_at": "2016-11-16 17:53:58"
          }
        }
     *
     * @apiUse UserNotFoundError
     */
    public function getDefaultArr()
    {
        $default = User::findOrFail($this->user->id)->defaultAddress();
        return $default;
    }

    /**
     * @api {post} /address?openid=xxx  新建地址保存
     * @apiVersion 1.0.0
     * @apiName  postAddress
     * @apiGroup Address
     * @apiParam {String} openid 微信用户openid
     * @apiParam {Number} school_id 学校id
     * @apiParam {Number} campus_id 校区id
     * @apiParam {Number} dorm_id 宿舍id
     * @apiParam {String} room_number 房间号
     *
     * @apiSuccessExample 成功返回:
     * HTTP/1.1 200 OK
     * 
     *
     * @apiUse UserNotFoundError
     */
    public function store(AddressRequest $request)
    {
        dd($request->input());
    	DB::beginTransaction();
    	try {
    		Address::where(['status'=>'1', 'id'=>$this->user->id])
    		          ->update(['status' => '0']);

    		Address::create([
    			'user_id' => $this->user->id,
    			'school_id' => $request->school_id,
    			'campus_id' => $request->campus_id,
    			'dorm_id' => $request->dorm_id,
    			'status' => '1'
    		]);
    	    DB::commit();
    	} catch (Exception $e){
    	   DB::rollback();
    	   throw $e;
    	}       
    	return 'success';
    }

    public function update($address_id)
    {
        $default = Address::findOrFail($address_id);
        $others = Address::where('user_id', $this->user->id)->where('id', '<>', $address_id)->get();

        DB::beginTransaction();
        try {
            $default->update(['status'=>'1']);
            foreach($others as $o){
                $o->update(['status'=>'0']);
            }           
            DB::commit();
        } catch (Exception $e){
           DB::rollback();
           throw $e;
        }
    	return 'success';
    }

    public function destroy(Address $address)
    {
    	$address->delete();
    	return 'success';
    }
}
