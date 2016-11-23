<?php

use Illuminate\Database\Seeder;
use App\Unis\Order\Order;
use App\Unis\Order\OrderItem;
use App\Unis\User\User;
use App\Unis\Suplier\Food;
use App\Unis\School\Dorm;
use Carbon\Carbon;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::truncate();
        OrderItem::truncate();
        $faker = Faker\Factory::create();
        $dorm_count = Dorm::all()->count();
        $users = User::where('id', '>', 1)->get();
        foreach($users as $user){
            foreach(range(1, 3) as $index){
                $time = $faker->DateTime('2016-03-15 02:00:49');
                $order_no = $user->id.date('ymdHis');
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
                        'amount'=>$food->num,
                        'price'=>$food->priceAfterDiscount(),
                        'order_id'=>$order->id
                    ]);
                }
            }
        }

        $order_count = Order::all()->count();
        $taken_order = Order::inRandomOrder()->take(ceil($order_count * 0.8))->get();
        foreach ($taken_order as $order) {
            $order->status = 'taken';
            $taken_time = Carbon::instance($order->paid_at)->addMinutes(mt_rand(5, 39));
            $order->taken_at = $taken_time;
            $order->save();
        }

        $taken_order_count = Order::where('status', 'taken')->count();
        $delived_order = Order::where('status', 'taken')->inRandomOrder()->take(ceil($taken_order_count * 0.8))->get();
        foreach ($delived_order as $order) {
            $order->status = 'delivered';
            $order->delivered_at = Carbon::instance($order->taken_at)->addMinutes(mt_rand(10, 30));
            $order->save();
        }   

        $received_order_count = Order::where('status', 'delivered')->count();
        $received_order = Order::where('status', 'delivered')->inRandomOrder()->take(ceil($received_order_count * 0.8))->get();
        foreach ($received_order as $order) {
            $order->status = 'received';
            $order->received_at = Carbon::instance($order->delivered_at)->addMinutes(mt_rand(10, 30));
            $order->save();
        }

        $withdrawed_order_count = Order::where('status', 'received')->count();
        $withdrawed_order = Order::where('status', 'received')->inRandomOrder()->take(ceil($withdrawed_order_count * 0.8))->get();
        foreach ($withdrawed_order as $order) {
            $order->status = 'withdrawed';
            $order->withdrawed_at = Carbon::instance($order->received_at)->addMinutes(mt_rand(10, 30));
            $order->save();
        } 

        $refund_order_count = Order::where('status', 'paid')->count();
        $refund_order = Order::where('status', 'paid')->inRandomOrder()->take(ceil($refund_order_count * 0.2))->get();
        foreach ($refund_order as $order) {
            $order->status = 'refund';
            $order->refund_at = Carbon::instance($order->paid_at)->addMinutes(mt_rand(40, 120));
            $order->save();
        }     
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
            $food->num = mt_rand(1,3);
            $foods->total += $food->priceAfterDiscount()*$food->num;
        }
        return $foods;
    }
}

