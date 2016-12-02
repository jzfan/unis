<?php

use Illuminate\Database\Seeder;
use App\Unis\Order\Order;
use App\Unis\Order\OrderItem;
use App\Unis\User\User;
use App\Unis\Suplier\Food;
use App\Unis\School\Dorm;
use Carbon\Carbon;

class OrderTakeAbleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::orderBy('id', 'desc')->first();
        $this->createTakeAble($user);
    }

    // private function getOrderer()
    // {
    //     return User::inRandomOrder()->with(['addresses'=> function($q){
    //         $q->where('status', 1)->first();
    //     }])->first();
    // }

    private function getFoods()
    {
        $foods = Food::inRandomOrder()->take(mt_rand(1, 3))->get();
        $foods->total = 0;
        foreach ($foods as $food){
            $food->quantity = mt_rand(1,3);
            $foods->total += $food->sale_price*$food->quantity;
        }
        return $foods;
    }

    public function createTakeAble($user, $num=10)
    {
        $campus_id = $user->defaultAddress()->campus_id;
        $users = User::whereHas('addresses', function($q) use ($campus_id) {
            $q->where(['status'=>1, 'campus_id'=>$campus_id]);
        })->take($num)->get();
        $time = Carbon::now();
        foreach ($users as $user) {
            $this->createOrderAndItems($user, $time);
        }
        return 'created success.';
    }

    private function createOrderAndItems($user, $time)
    {       
        $foods = $this->getFoods();
        $order = Order::create([
            'order_no'=> $user->id.date('ymdHis'),
            'type' => 'wxpay',
            'subject' => str_limit(join('|', $foods->pluck('name')->toArray()), 255),
            'user_id' => $user->id,
            'school_id' => $user->defaultAddress()->school_id,
            'campus_id' => $user->defaultAddress()->campus_id,
            'dorm_id' => $user->defaultAddress()->dorm_id,
            'total' => $foods->total,
            'address' => $user->defaultAddress()->text(),
            'status' => 'paid',
            'paid_at' => $time,
            'appointment_at' => $time,
        ]);
        foreach($foods as $food){                   
            OrderItem::create([
                'food_id'=>$food->id,
                'quantity'=>$food->quantity,
                'price'=>$food->sale_price,
                'order_id'=>$order->id
            ]);
        }
    }
}

