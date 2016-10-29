<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Unis\User\User;
use App\Unis\Suplier\Suplier;
use App\Unis\School\School;

class AdminController extends Controller
{
    public function index()
    {
    	$members = User::member()->count();
    	$agents = User::agent()->count();
    	$schools = School::all()->count();
    	return view('backend.admin.index', compact('members', 'agents', 'schools'));
    }
}
