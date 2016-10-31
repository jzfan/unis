<?php

namespace App\Unis\School;

use Illuminate\Database\Eloquent\Model;
use App\Unis\Suplier\Shop;

class Canteen extends Model
{
    protected $fillable = ['school_id', 'name', 'address', 'status', 'x', 'y', 'geohash'];

    public function school()
    {
    	return $this->belongsTo(School::class);
    }

    public function shops()
    {
    	return $this->hasMany(Shop::class);
    }
}
