<?php

namespace App\Unis\Message;

use Illuminate\Database\Eloquent\Model;
use App\Unis\User\User;

class Report extends Model
{
    protected $fillable = ['user_id', 'content'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
