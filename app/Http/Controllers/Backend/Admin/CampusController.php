<?php

namespace App\Http\Controllers\Backend\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Unis\School\Campus;

class CampusController extends Controller
{
    public function index()
    {
    	$campuses = Campus::with('school')->paginate(config('site.perPage'));
    	return view('backend.campus.index', compact('campuses'));
    }
}
