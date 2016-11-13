<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Unis\School\Dorm;

class DormController extends Controller
{
    public function listByCampus($campus_id)
    {
    	$dorms = Dorm::select('id', 'name as text')->where('campus_id', $campus_id)->get()->toArray();
    	return $dorms;
    }

    public function getCampusBy($dorm_id)
    {
    	return Dorm::find($dorm_id)->campus->toArray();
    }
}
