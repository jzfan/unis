<?php

namespace App\Unis\School;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ['dorm_id', 'number'];

    public function dorm()
    {
    	return $this->belongsTo(Dorm::class);
    }
}
