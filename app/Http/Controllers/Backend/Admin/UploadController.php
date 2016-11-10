<?php

namespace App\Http\Controllers\Backend\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
    public function avatar(Request $request)
    {
    	if (!$request->hasFile('avatar')) {
    		return ['error'=>'no avatar file.'];
		}
		if (!$request->file('avatar')->isValid()){
			return ['error'=>'upload failed.'];
		}
    	$file = $request->avatar;
        $name = time().str_random(2).'.'.$file->extension();
        $file->move(public_path(config('site.avatarPath')), $name);
        return ['result'=>$name, 'state'=>200, 'message'=>null];

    }
}
