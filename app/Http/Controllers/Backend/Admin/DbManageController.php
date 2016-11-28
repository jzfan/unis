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
    	
    	Excel::selectSheetsByIndex(0)->load(storage_path('app/').$path, function($reader) {
    	        $data = $reader->all();
    	        foreach ($data as $item) {
    	        	// dd($item);
    	        	Food::create($item->toArray());
    	        }
    	    });
    	session()->flash('success', '导入成功！');
    	return 'success';
    }
}
