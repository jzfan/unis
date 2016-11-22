<?php

use Illuminate\Database\Seeder;
use App\Unis\School\School;
use App\Unis\School\Campus;
use App\Unis\School\Dorm;
use App\Unis\School\Canteen;

class CampusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Campus::truncate();
        Canteen::truncate();
        Dorm::truncate();

        $faker = Faker\Factory::create();
        $schools = School::all();
        foreach ($schools as $school) {
        	foreach (range(1, 2) as $index) {
	        	$campus = Campus::create([
	        		'school_id' => $school->id,
	        		'name' => $faker->word . '校区',
	        		]);

        	$campus->canteens()->saveMany(factory(Canteen::class, mt_rand(2,3))->make());
            $campus->dorms()->saveMany(factory(Dorm::class, mt_rand(2,3))->make());

        }
    }
    }
}
