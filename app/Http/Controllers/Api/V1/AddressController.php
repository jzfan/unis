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

    public function getDefault()
    {
    	$default = User::findOrFail($this->user->id)->defaultAddress()->text();
    	return $default;
    }

    public function getDefaultArr()
    {
        $default = User::findOrFail($this->user->id)->defaultAddress();
        return $default;
    }

    public function store(AddressRequest $request)
    {
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
