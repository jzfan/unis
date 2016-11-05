<?php

namespace App\Unis\School;

use Illuminate\Database\Eloquent\Model;
use App\Unis\User\User;

class Room extends Model
{
    protected $fillable = ['dorm_id', 'number'];

    public function dorm()
    {
    	return $this->belongsTo(Dorm::class);
    }

    public function users()
    {
    	return $this->hasMany(User::class);
    }
}
