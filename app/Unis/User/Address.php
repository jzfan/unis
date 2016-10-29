<?php

namespace App\Unis\User;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public function getAddr1Attribute($value)
    {
    	return $this->province . $this->city . $value;
    }
}
