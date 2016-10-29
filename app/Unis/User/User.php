<?php

namespace App\Unis\User;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Unis\User\UserTrait\AdminMethods;
use App\Unis\User\UserTrait\MemberMethods;
use App\Unis\User\UserTrait\AgentMethods;
use App\Unis\Suplier\Food;

class User extends Authenticatable
{
    use Notifiable;
    use AdminMethods;
    use MemberMethods;
    use AgentMethods;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'weixin_openid', 'status', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'weixin_token'
    ];

    public function getStatusAttribute($value)
    {
        return $value == 0 ? '禁用' : '启用';
    }

    public function address()
    {
        return $this->hasOne(Address::class);
    }

    public function favorites()
    {
        return $this->belongsToMany(Food::class, 'favorites');
    }

    public function recommends()
    {
        return $this->belongsToMany(Food::class, 'recommends');
    }

}
