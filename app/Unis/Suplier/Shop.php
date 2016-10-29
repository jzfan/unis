<?php

namespace App\Unis\Suplier;

use Illuminate\Database\Eloquent\Model;
use App\Unis\School\School;
use App\Unis\School\Canteen;
use App\Unis\Suplier\Suplier;

class Shop extends Model
{
    public function foods()
    {
    	return $this->hasMany(Food::class);
    }

    public function canteen()
    {
    	return $this->belongsTo(Canteen::class);
    }

    public function suplier()
    {
    	return $this->belongsTo(Suplier::class);
    }
}
