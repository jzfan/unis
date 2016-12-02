<?php

namespace App\Unis\User;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Unis\Traits\UserTrait\AdminMethods;
use App\Unis\Traits\UserTrait\MemberMethods;
use App\Unis\Traits\UserTrait\AgentMethods;
use App\Unis\Suplier\Food;
use App\Unis\School\Dorm;
use App\Unis\Order\Cart;
use App\Unis\User\Address;
use App\Unis\Traits\StatusAttribute;

class User extends Authenticatable
{
    use Notifiable;
    use AdminMethods;
    use MemberMethods;
    use AgentMethods;
    use StatusAttribute;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'wechat_openid', 'status', 'avatar', 'phone', 'gender', 'balance'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'wechat_token'
    ];

    // public function getStatusAttribute($value)
    // {
    //     return $value == 0 ? '禁用' : '启用';
    // }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function defaultAddress()
    {
        return $this->addresses()->where('status', '1')->first();
    }

    public function recommends()
    {
        return $this->belongsToMany(Food::class, 'recommends', 'user_id', 'food_id');
    }

    public function campus()
    {
        return $this->defaultAddress()->campus;
    }
    public function school()
    {
        return $this->defaultAddress()->school;
    }
    public function dorm()
    {
        return $this->defaultAddress()->dorm;
    }

    public function getAvatarAttribute($value)
    {
        if (starts_with($value, 'http')){
            return $value;
        } 
        return config('site.avatarPath') . $value;
    }

    public function setAvatarAttribute($value)
    {
        $path = config('site.avatarPath');
        if (starts_with($value, $path)){
            $this->attributes['avatar'] = str_replace($path, '', $value);
        }else{
            $this->attributes['avatar'] = $value;
        }
    }
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = urlencode($value);
    }

    public function getNameAttribute($value)
    {
        return urldecode($value);
    }

}
