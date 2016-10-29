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
	            'img' => $faker->imageUrl(100, 70),
	            'description' => $faker->text,
	            'price' => $faker->numberBetween(100, 9999),
	            'favorite' => mt_rand(1, 555),
	            'recommend' => mt_rand(1, 555),
	            'status' => (string)mt_rand(0 ,1)
        	]);
        }
    }
}
