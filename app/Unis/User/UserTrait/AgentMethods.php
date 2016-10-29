<?php

namespace App\Unis\User\UserTrait;

trait AgentMethods{

	public function scopeAgent($query)
	{
		return $query->where('role', 'agent');
	}
}