<?php

namespace App\Http\Controllers\Backend\Admin;

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
    	$members_count  = User::member()->count();
    	$agents_count   = User::agent()->count();
    	$schools_count  = School::all()->count();
    	$supliers_count = Suplier::all()->count(); 
    	return view('backend.admin.index', compact('members_count', 'agents_count', 'schools_count', 'supliers_count'));
    }
}
