<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Unis\School\Dorm;

class DormController extends Controller
{
    public function index()
    {
    	$dorms = Dorm::with('school')->orderBy('school_id')->paginate(config('site.perPage'));
    	return view('backend.dorm.index', compact('dorms'));
    }
}
