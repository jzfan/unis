<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Unis\Common\Datatable;

class DatatableController extends Controller
{
	protected $table;

    public function ajax($table)
    {
    	$this->table = str_plural($table);
    	$this->$table();
    }

    public function shop()
    {
    	$columns = [
    	    [ 'db' => 'id', 'dt' => 0 ],
    	    [ 'db' => 'name',  'dt' => 1 ],
    	    [ 'db' => 'canteen_id',  'dt' => 2 ],
    	    [ 'db' => 'suplier_id',  'dt' => 3 ],
    	    [ 'db' => 'created_at',  'dt' => 4 ],

    	];

    	Datatable::server($this->table, $columns);
    }
}
