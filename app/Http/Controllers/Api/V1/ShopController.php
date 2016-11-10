<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Unis\Suplier\Shop;

class ShopController extends Controller
{
    public function dt(Request $request)
    {
    	$shops = Shop::with('canteen.campus.school', 'suplier')->orderBy('id', 'desc')->get()->toArray();
    	return [
    				'draw' => (int)$request->draw,
    				'recordsTotal'=> Shop::all()->count(),
    				'recordsFiltered'=> Shop::all()->count(),
    				'data' => $shops
    			];
    }
}
