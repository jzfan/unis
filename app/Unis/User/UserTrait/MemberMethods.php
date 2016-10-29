<?php

namespace App\Unis\User\UserTrait;

// use App\Unis\User\User;

trait MemberMethods{

	public function scopeMember($query)
	{
		return $query->where('role', 'member');
	}
}