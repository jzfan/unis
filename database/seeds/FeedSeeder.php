<?php

use Illuminate\Database\Seeder;
use App\Unis\Message\Feed;
use App\Unis\Order\Order;
use App\Unis\User\User;

class FeedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Feed::truncate();

        $faker = Faker\Factory::create();

        $count = User::all()->count();

        foreach(range(1, $count) as $index){
        	$sender = User::find($index);
        	foreach(range(1,5) as $index2){

        	$receiver = $orderer = User::inRandomOrder()->first();
        	Feed::create([
        		'order_no' => (string)Order::inRandomOrder()->first()->order_no,
        		'sender_id' => $sender->id,
        		'receiver_id' => $receiver->id,
        		'status' => (string)mt_rand(0,1),
        		'type' => array_rand(array_flip(['paid', 'taken', 'delivered', 'received'])),

        	]);
        	}
        }
    }
}
