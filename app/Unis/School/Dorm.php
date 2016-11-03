<?php

namespace App\Unis\School;

use Illuminate\Database\Eloquent\Model;
use App\Unis\Traits\StatusAttribute;
use App\Unis\School\Room;

class Dorm extends Model
{
	use StatusAttribute;
	
    public function school()
    {
    	return $this->belongsTo(School::class);
    }

    public function rooms()
    {
    	return $this->hasMany(Room::class);
    }

    public function campus()
    {
    	return $this->belongsTo(Campus::class);
    }
}
