<?php

use Illuminate\Database\Seeder;
use App\Unis\Order\Order;
use App\Unis\Order\OrderItem;
use App\Unis\User\User;
use App\Unis\Suplier\Food;
use App\Unis\School\Dorm;

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
        foreach (range(100, mt_rand(111, 999)) as $index) {
        	$now = \Carbon\Carbon::now();
        	$created_at = $now->subMinutes(mt_rand(5, 60*24*30*2));
        	$orderer = User::inRandomOrder()->with(['addresses'=> function($q){
                $q->where('status', 1)->first();
            }])->first();

        	$paid = (bool) ($index % 2 == 0 || $index % 3 == 0);
        	$paid_at = $paid ? $created_at->addMinutes(mt_rand(1, 5)) : null;
        	$status = $paid ? 'paid' : 'ordered';

        	$taken = (bool) ($paid && $index % 3 == 0);
        	$taken_at = $taken ? $paid_at->addMinutes(mt_rand(5, 55)) : null;
        	$status = $taken ? 'taken' : $status;

        	$delived = (bool) ($taken && $index % 4 != 0);
        	$deliver_id = $delived ? User::inRandomOrder()->first()->id : null;
        	$deliver_at = $delived ? $taken_at->addMinutes(mt_rand(5, 60)) : null;
        	$status = $delived ? 'delivered' : $status;

        	$withdrawed = (bool) ($delived && $index % 5 != 0);
        	$withdrawed_at = $withdrawed ? $deliver_at->addHours(mt_rand(1, 66)) : null;
        	$status = $withdrawed ? 'withdrawed' : $status;

        	$foods = Food::inRandomOrder()->take(mt_rand(2, 4))->get();

        	$subject = [];
        	$total = 0;
            $order_no = date('YmdHis').'_'.str_random(4).'_'.$orderer->id.'_'.$orderer->room_number;
        	foreach ($foods as $food) {
                $amount = mt_rand(1, 3);
                $price = $food->price * (100 - $food->discount)/100;
                OrderItem::create(['food_id'=>$food->id, 'amount'=>$amount, 'price'=>$price, 'order_no'=>$order_no]);
                $sum = $price * $amount;
        		$subject[] = $food->name;
        		$total += $sum;
        	}
        	$mark = ($index % 7 == 0) ? $faker->sentence : null;
        	Order::create([
        		'type' => 'wxpay',
        		'order_no' => $order_no,
        		'subject' => join('|', $subject),
                'user_id' => $orderer->id,
                'school_id' => $orderer->defaultAddress()->school->id,
                'campus_id' => $orderer->defaultAddress()->campus->id,
        		'dorm_id' => $orderer->defaultAddress()->dorm->id,
        		'deliver_id' => $deliver_id,
        		'total' => $total,
        		'address' => $orderer->defaultAddress()->text(),
        		'status' => $status,
        		'paid_at' => $paid_at,
        		'taken_at' => $taken_at,
        		'delivered_at' => $deliver_at,
        		'withdrawed_at' => $withdrawed_at,
        		'mark' => $mark

        	]);
        }
    }

    private function getOrderer()
    {
        return User::inRandomOrder()->with(['addresses'=> function($q){
            $q->where('status', 1)->first();
        }])->first();
    }
}
