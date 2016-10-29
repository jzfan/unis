<?php

use Illuminate\Database\Seeder;
use App\Unis\Suplier\Shop;
use App\Unis\Suplier\Suplier;
use App\Unis\School\Canteen;

class ShopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Shop::truncate();

        $canteen_count = Canteen::all()->count();
        $suplier_count = Suplier::all()->count();

        $faker = Faker\Factory::create();
        foreach (range(1, 80) as $index){
        	Shop::create([
        		'name' => $faker->word. ' 小店',
                'canteen_id' => mt_rand(1, $canteen_count),
                'suplier_id' => mt_rand(1, $suplier_count),
        		]);
        }
    }
}
