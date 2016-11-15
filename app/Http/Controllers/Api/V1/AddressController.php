<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Unis\User\User;
use App\Unis\User\Address;
use \DB;

class AddressController extends BaseController
{
    public function index()
    {
    	return User::find($this->user->id)->addresses;
    }

    public function getDefault()
    {
    	$default = User::findOrFail($this->user->id)->defaultAddress()->text();
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

    public function update(Address $address, AddressRequest $request)
    {
    	$address->update($request0->input());
    	return 'success';
    }

    public function destroy(Address $address)
    {
    	$address->delete();
    	return 'success';
    }
}
