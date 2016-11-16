<?php

use Illuminate\Database\Seeder;
use App\Unis\Order\Order;
use App\Unis\Order\OrderItem;
use App\Unis\User\User;
use App\Unis\Suplier\Food;
use App\Unis\School\Dorm;

class TestSeeder extends Seeder
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
        	foreach(range(1, 5) as $index){
        		$time = $faker->DateTime('2016-03-15 02:00:49');
        		$order_no = dechex(time());
        		$foods = $this->getFoods($order_no);
        		Order::create([
        			'order_no'=> $order_no,
					'type' => 'wxpay',
					'subject' => join('|', $foods['subject']),
			        'user_id' => $user->id,
			        'school_id' => $user->defaultAddress()->school_id,
			        'campus_id' => $user->defaultAddress()->campus_id,
					'dorm_id' => $user->defaultAddress()->dorm_id,
					'total' => $foods['total'],
					'address' => $user->defaultAddress()->text(),
					'status' => 'paid',
					'paid_at' => $time,
        		]);
        	}
        }

        $count = Order::count();
        $orders = Order::all();

        foreach($orders as $order){
        	foreach(range(1, 5) as $index){
        		$time = $order->paid_at;
        		Order::update([
        			'order_no'=> $order_no,
					'type' => 'wxpay',
					'subject' => join('|', $foods['subject']),
			        'user_id' => $user->id,
			        'school_id' => $user->defaultAddress()->school_id,
			        'campus_id' => $user->defaultAddress()->campus_id,
					'dorm_id' => $user->defaultAddress()->dorm_id,
					'total' => $foods['total'],
					'address' => $user->defaultAddress()->text(),
					'status' => 'paid',
					'paid_at' => $time,
        		]);
        	}
        }
      
    }

    private function getOrderer()
    {
        return User::inRandomOrder()->with(['addresses'=> function($q){
            $q->where('status', 1)->first();
        }])->first();
    }

    private function getFoods($order_no)
    {
		$foods = Food::inRandomOrder()->take(mt_rand(1, 2))->get();
		$subject = [];
		$total = 0;
		foreach ($foods as $food) {
	        $amount = mt_rand(1, 3);
	        $price = $food->price * (100 - $food->discount)/100;
	        OrderItem::create(['food_id'=>$food->id, 'amount'=>$amount, 'price'=>$price, 'order_no'=>$order_no]);
	        $sum = $price * $amount;
			$subject[] = $food->name;
			$total += $sum;
		}
		return ['subject'=>$subject, 'total'=>$total ];
    }
}

