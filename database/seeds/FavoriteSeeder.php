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
        DB::table('favorites')->truncate();

        $users = User::inRandomOrder()->get();

        foreach ($users as $user) {
            $foods = Food::inRandomOrder()->take(mt_rand(0,4))->get();
            foreach ($foods as $food) {
                DB::table('favorites')->insert([
                    'user_id' => $user->id,
                    'food_id' => $food->id,
                    'status'  => (string) mt_rand(0, 1),
                    'created_at' =>\Carbon\Carbon::now(),
                    'updated_at' =>\Carbon\Carbon::now(),
                    ]);
            }
        }
    }
}
