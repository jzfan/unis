<?php

namespace App\Unis\User;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $fillable = ['user_id', 'wechat_openid', 'food_id', 'status'];
}
