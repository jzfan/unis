<?php

namespace App\Http\Controllers\Wechat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Wechat;
use App\Unis\User\User;
use App\Unis\User\Address;
use App\Unis\Suplier\Food;
use App\Unis\School\Canteen;
use App\Unis\Order\Order;
use League\Fractal;
use League\Fractal\Manager as FractalManager;
use App\Unis\Suplier\Transformer\FoodTransformer;

class IndexController extends BaseController
{


    public $selected_canteen;

    public function index(Request $request)
    {
        $address = Address::where('user_id', $this->getWechatUser()->id)->where('status', '1')->first();
        // dd($address);
        if (! $address){
            abort('403', 'the user have no address');
        }
        $campus = $address->campus;
        $canteens = $campus->canteens;
        $foods = $this->foodData($request, $canteens);

        $orders = $this->orderData($campus);
        $selected_canteen = $this->selected_canteen;
        $shops = $this->shopsData($selected_canteen->id);
    	return view('wechat.index', compact('canteens', 'selected_canteen', 'foods', 'orders', 'shops'));
    }

    public function about()
    {
    	return view('wechat.about');
    }

    public function report()
    {
    	return view('wechat.report');
    }

    public function postReport()
    {
        return 'post report';
    }


    public function foodData($request, $canteens)
    {
        $canteen_id = $request->canteen_id;
        if ($canteen_id){
            $this->selected_canteen = Canteen::find($canteen_id);
            // $shops_id = $this->selected_canteen->shops->pluck('id');
        }else{
            $this->selected_canteen = $canteens->last();
        }
        $shops_id = $this->selected_canteen->shops->pluck('id');
        $paginator = Food::whereIn('shop_id', $shops_id)->with('shop')->paginate(config('site.perPage'));
        $foods = $paginator->getCollection();
        return fractal()
            ->collection($foods, new FoodTransformer())
            ->paginateWith(new Fractal\Pagination\IlluminatePaginatorAdapter($paginator))
            ->parseIncludes(['shop'])
            ->toArray();
    }

    public function orderData($campus)
    {
        $users_id = User::whereHas('addresses', function($q) use($campus){
            $q->where(['campus_id'=>$campus->id, 'status'=>'1']);
        })->pluck('id');

        return Order::where('campus_id', $campus->id)->with('order_items.food.shop.canteen', 'orderer')
                            ->where('status', 'ordered')->orderBy('created_at', 'asc')->simplePaginate(config('site.perPage'));
    }

    public function shopsData($canteen_id)
    {
        return Canteen::find($canteen_id)->shops;
    }

    public function demo()
    {
        return view('wechat.demo.json');
    }
}