<?php

use Illuminate\Database\Seeder;
use App\Unis\School\School;
use App\Unis\School\Canteen;
use App\Unis\School\Dorm;

class SchoolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        School::truncate();
        Canteen::truncate();
        Dorm::truncate();

        factory(School::class, 5)->create()->each( function ($school) {
        	$school->canteens()->saveMany(factory(Canteen::class, mt_rand(2,4))->make());
        	$school->dorms()->saveMany(factory(Dorm::class, mt_rand(2,4))->make());
        });
    }
}
