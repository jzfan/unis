<?php

namespace App\Unis\Traits;

trait PriceAttribute{

    public function getPriceAttribute($value)
    {
    	return number_format($value / 100 , 2);
    } 

    public function setPriceAttribute($value)
    {
    	$this->attributes['price'] =$value * 100;
    }

}