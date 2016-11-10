<?php

use Illuminate\Database\Seeder;
use App\Unis\Suplier\Shop;
use App\Unis\Suplier\Food;

class FoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Food::truncate();
    	$faker = Faker\Factory::create();
        $shop_count = Shop::all()->count();
        foreach (range(1, $shop_count*8) as $index) {
        	Food::create([
	            'shop_id' => mt_rand(1, $shop_count),
                'name' => $faker->word . '食品',
	            'img' => $faker->imageUrl(50, 50),
	            'description' => $faker->text,
	            'price' => $faker->numberBetween(4, 60) / 2,
                'discount' => $faker->numberBetween(1, 5) * 10,
                'sold' => $faker->numberBetween(0, 200),
	            'favorite' => mt_rand(1, 100),
	            'recommend' => mt_rand(1, 100),
	            'status' => (string)mt_rand(0 ,1)
        	]);
        }
    }
}
