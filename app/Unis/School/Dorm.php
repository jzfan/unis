<?php

namespace App\Unis\School;

use Illuminate\Database\Eloquent\Model;
use App\Unis\Traits\StatusAttribute;
use App\Unis\School\Room;
use App\Unis\User\User;

class Dorm extends Model
{
	use StatusAttribute;
	
    protected $fillable = ['name', 'campus_id', 'address', 'status', 'x', 'y', 'geohash'];
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

    public function users()
    {
        return $this->hasManyThrough(User::class, Room::class);
    }
}
