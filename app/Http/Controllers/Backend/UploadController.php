<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Image;

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

        $json = json_decode($request->avatar_data);
        $img = Image::make($request->avatar);

        // resized sizes
        $cropW = (int)$json->width;
        $cropH = (int)$json->height;
        // offsets
        $imgY = (int)$json->y;
        $imgX = (int)$json->x;
        // crop box
        $imgW = $img->width();
        $imgH = $img->height();
        // rotation angle
        $angle = $json->rotate;


        $filename_ext = time().str_random(2).'.jpg';
        $img->resize($imgW, $imgH)
            ->rotate(-$angle)
            ->crop($cropW, $cropH, $imgX, $imgY)
            ->encode('jpg')
            ->save(public_path(config('site.avatarPath')). $filename_ext);

        if( !$img) {

            return [
                'status' => 'error',
                'message' => 'Server error while uploading',
            ];

        }

        return ['result'=>$filename_ext, 'state'=>200, 'message'=>'success'];

    }
}
