<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Unis\User\User;

class UserController extends Controller
{
	public function index()
	{
		return User::all()->take(5);
	}
    public function show($id)
    {
    	$user = User::findOrFail($id);
    	return $user;
    }
}
