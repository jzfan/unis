<?php

namespace App\Unis\School;

use Illuminate\Database\Eloquent\Model;
use App\Unis\Traits\StatusAttribute;
use App\Unis\School\Canteen;
use App\Unis\School\Dorm;

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

    public function Dorms()
    {
    	return $this->hasMany(Dorm::class);
    }

}
