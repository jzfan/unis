<?php

namespace App\Unis\Suplier;

use Illuminate\Database\Eloquent\Model;
use App\Unis\School\School;
use App\Unis\Traits\StatusAttribute;

class Suplier extends Model
{
	use StatusAttribute;
	
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
