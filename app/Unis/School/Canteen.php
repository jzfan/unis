<?php

namespace App\Unis\School;

use App\Unis\Order\Order;
use App\Unis\Suplier\Shop;
use App\Unis\Traits\StatusAttribute;
use Illuminate\Database\Eloquent\Model;

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

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function DormsOfTheSameCampus()
    {
        return $this->campus->dorms;
    }
}
