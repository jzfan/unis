<?php

namespace App\Unis\User;

use Illuminate\Database\Eloquent\Model;
use App\Unis\Traits\StatusAttribute;

class Address extends Model
{
	use StatusAttribute;
	
    public function getAddr1Attribute($value)
    {
    	return $this->province . $this->city . $value;
    }
}
