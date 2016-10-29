<?php

namespace App\Unis\User\UserTrait;

trait AdminMethods{

	public function isAdmin()
	{
		return \Auth::User()->role === 'admin';
	}
}