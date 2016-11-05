<?php

namespace App\Unis\Suplier;

use Illuminate\Database\Eloquent\Model;
use App\Unis\School\School;
use App\Unis\School\Canteen;
use App\Unis\Suplier\Suplier;
use App\Unis\Traits\StatusAttribute;

class Shop extends Model
{
    use StatusAttribute;
    
    protected $fillable = ['canteen_id', 'suplier_id', 'name'];

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
