<?php

namespace App\Unis\Suplier;

use Illuminate\Database\Eloquent\Model;
use App\Unis\School\School;

class Suplier extends Model
{
	protected $fillable = ['company', 'manager', 'address', 'tel', 'email'];

    public function schools()
    {
    	return $this->belongsToMany(School::class);
    }

    public function shops()
    {
    	return $this->hasMany(Shop::class);
    }
}
