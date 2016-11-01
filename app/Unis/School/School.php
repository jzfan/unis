<?php

namespace App\Unis\School;

use Illuminate\Database\Eloquent\Model;
use App\Unis\Suplier\Suplier;
use App\Unis\Traits\StatusAttribute;

class School extends Model
{
    use StatusAttribute;

	protected $fillable = ['name', 'province', 'city', 'block', 'address', 'status'];

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

    public function campuses()
    {
        return $this->hasMany(Campus::class);
    }

}
