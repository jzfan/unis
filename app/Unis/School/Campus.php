<?php

namespace App\Unis\School;

use Illuminate\Database\Eloquent\Model;
use App\Unis\Traits\StatusAttribute;

class Campus extends Model
{
	use StatusAttribute;
	
    protected $fillable = ['school_id', 'name', 'status', 'address', 'x', 'y', 'geohash'];

    public function school()
    {
    	return $this->belongsTo(School::class);
    }

}
