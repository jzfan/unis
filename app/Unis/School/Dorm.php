<?php

namespace App\Unis\School;

use Illuminate\Database\Eloquent\Model;

class Dorm extends Model
{
    public function school()
    {
    	return $this->belongsTo(School::class);
    }
}
