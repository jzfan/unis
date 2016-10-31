<?php

namespace App\Unis\Traits\UserTrait;

// use App\Unis\User\User;

trait MemberMethods{

	public function scopeMember($query)
	{
		return $query->where('role', 'member');
	}
}