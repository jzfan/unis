<?php

namespace App\Unis\Traits\UserTrait;

trait AgentMethods{

	public function scopeAgent($query)
	{
		return $query->where('role', 'agent');
	}
}