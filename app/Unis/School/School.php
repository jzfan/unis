<?php

namespace App\Unis\School;

use Illuminate\Database\Eloquent\Model;
use App\Unis\Suplier\Suplier;

class School extends Model
{
	protected $fillable = ['name', 'province', 'city', 'block', 'address', 'latitude', 'longitude', 'geohash'];

    public function canteens()
    {
    	return $this->hasMany(Canteen::class);
    }

    public function dorms()
    {
    	return $this->hasMany(Dorm::class);
    }

    public function supliers()
    {
    	return $this->belongsToMany(Suplier::class);
    }

}
