<?php

namespace App\Unis\School;

use Illuminate\Database\Eloquent\Model;
use App\Unis\Suplier\Shop;
use App\Unis\Traits\StatusAttribute;

class Canteen extends Model
{
	use StatusAttribute;
	
    protected $fillable = ['campus_id', 'name', 'address', 'status', 'x', 'y', 'geohash'];

    public function school()
    {
    	return $this->belongsTo(School::class);
    }

    public function shops()
    {
    	return $this->hasMany(Shop::class);
    }

    public function campus()
    {
    	return $this->belongsTo(Campus::class);
    }
}
