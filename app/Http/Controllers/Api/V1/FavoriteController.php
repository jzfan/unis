<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Unis\User\User;

class FavoriteController extends Controller
{
    public function index($user)
    {
    	return User::find($user)->favorites;
    	// return $user->favorites;
    }
}
