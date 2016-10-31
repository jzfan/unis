<?php

namespace App\Unis\Traits\UserTrait;

trait AdminMethods{

	public function isAdmin()
	{
		return \Auth::User()->role === 'admin';
	}
}