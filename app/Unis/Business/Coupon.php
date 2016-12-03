<?php

namespace App\Unis\Business;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = ['user_id', 'token'];

    protected $hidden = ['token'];

    public static function generate($num=100)
    {
    	foreach (range(1, $num) as $index) {
    		self::create([
    			'token' => str_random(60)
    		]);
    	}
    	return 'success';
    }
}
