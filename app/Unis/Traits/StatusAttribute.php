<?php

namespace App\Unis\Traits;

trait StatusAttribute{

    public function getStatusAttribute($value)
    {
    	switch ($value) {
    		case 1:
    			return '启用';
    		case 0:    		
    		default:
    			return '禁用';
    	}
    }

}