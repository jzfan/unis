<?php

use Illuminate\Database\Seeder;
use App\Unis\User\User;
use App\Unis\Suplier\Food;

class FavoriteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users_count = User::all()->count();
        $foods_count = Food::all()->count();

        foreach (range(1, mt_rand(10, $users_count)) as $user_index) {
        	foreach(range(1, mt_rand(1, $foods_count)) as $food_index){
        		\DB::insert([
        			'user_id' => $user_index,
        			'food_id' => $food_index
        			]);
        	}
        }
    }
}
