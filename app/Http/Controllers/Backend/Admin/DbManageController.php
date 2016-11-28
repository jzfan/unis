<?php

namespace App\Http\Controllers\Backend\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Excel;
use App\Unis\Suplier\Food;

class DbManageController extends Controller
{

	public function importIndex()
	{
		return view('backend.admin.db.importIndex');
	}

    public function excelImport(Request $request)
    {

	    $path = $request->file->storeAs('excel', time().'.xls');
    	
    	Excel::load(storage_path('app/').$path, function($reader) {
    	        $data = $reader->all();
    	        dd($data);
    	        foreach ($data as $item) {
    	        	Food::create($item->toArray());
    	        }
    	    });
    	return redirect('/admi/food')->with('success', '导入成功！');
    }
}
