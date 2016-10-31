<?php

namespace App\Unis\School;

use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    protected $fillable = ['school_id', 'name'];

    public function school()
    {
    	return $this->belongsTo(School::class);
    }

}
