<?php

use Illuminate\Database\Seeder;
use App\Unis\School\School;
use App\Unis\School\Campus;

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

        $faker = Faker\Factory::create();
        $schools = School::all();
        foreach ($schools as $school) {
        	foreach (range(0, 4) as $index) {
	        	Campus::create([
	        		'school_id' => $school->id,
	        		'name' => $faker->word . '校区',
	        		]);
        	}
        }
    }
}
