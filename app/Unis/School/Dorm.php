<?php

namespace App\Unis\School;

use Illuminate\Database\Eloquent\Model;
use App\Unis\Traits\StatusAttribute;

class Dorm extends Model
{
	use StatusAttribute;
	
    public function school()
    {
    	return $this->belongsTo(School::class);
    }
}
