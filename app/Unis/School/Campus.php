<?php

namespace App\Unis\School;

use Illuminate\Database\Eloquent\Model;
use App\Unis\Traits\StatusAttribute;
use App\Unis\School\Canteen;
use App\Unis\School\Dorm;
use App\Unis\User\User;
use App\Unis\User\Address;

class Campus extends Model
{
	use StatusAttribute;
	
    protected $fillable = ['school_id', 'name', 'status', 'address', 'x', 'y', 'geohash'];

    public function school()
    {
    	return $this->belongsTo(School::class);
    }

    public function canteens()
    {
    	return $this->hasMany(Canteen::class);
    }

    public function dorms()
    {
    	return $this->hasMany(Dorm::class);
    }

    public function users()
    {
        return $this->hasManyThrough(User::class, Address::class, 'user_id', 'campus_id');
        // return $this->
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

}
