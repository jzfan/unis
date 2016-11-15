<?php

namespace App\Unis\User;

use Illuminate\Database\Eloquent\Model;
use App\Unis\School\School;
use App\Unis\School\Campus;
use App\Unis\School\Dorm;
use App\Unis\User\User;

class Address extends Model
{
    protected $fillable = ['user_id', 'school_id', 'campus_id', 'dorm_id', 'room_number', 'mark', 'status'];

    public function campus()
    {
    	return $this->belongsTo(Campus::class);
    }

    public function school()
    {
    	return $this->belongsTo(School::class);
    }

    public function dorm()
    {
    	return $this->belongsTo(Dorm::class);
    }

    public function users()
    {
    	return $this->belongsToMany(User::class);
    }

    public function text()
    {
        return $this->school->name . $this->campus->name . $this->dorm->name . $this->room_number;
    }
}
