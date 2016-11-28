<?php

namespace App\Http\Controllers\Backend\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Excel;
use App\Unis\Suplier\Food;

class DbManageController extends Controller
{
    public function import()
    {
    	$filePath = 'storage/foods.xls';
    	Excel::load($filePath, function($reader) {
    	        $data = $reader->all();
    	        foreach ($data as $item) {
    	        	Food::create($item->toArray());
    	        }
    	    });
    	return 'done';
    }
}
