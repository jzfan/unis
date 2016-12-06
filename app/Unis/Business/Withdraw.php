<?php

namespace App\Unis\Business;

use App\Unis\User\User;
use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    protected $fillable = ['user_id', 'amount'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
