<?php

use Illuminate\Database\Seeder;
use App\Unis\User\Address;
use App\Unis\User\User;
use App\Unis\School\School;
use App\Unis\School\Campus;
use App\Unis\School\Dorm;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Address::truncate();

        $faker = Faker\Factory::create();

        $count = User::all()->count();
        $s_count = School::all()->count();
        $c_count = Campus::all()->count();
        $d_count = Dorm::all()->count();
        foreach(range(1, $count) as $index){
        	$school_id = mt_rand(1, $s_count);
        	Address::create([
        		'user_id' => $index,
        		'school_id' => $school_id,
        		'campus_id' => mt_rand(1, $c_count),
        		'dorm_id' => mt_rand(1, $d_count),
        		'room_number' => $faker->randomDigitNotNull,
        		'status' => (string)1
        	]);
        	Address::create([
        		'user_id' => $index,
        		'school_id' => $school_id,
        		'campus_id' => mt_rand(1, $c_count),
        		'dorm_id' => mt_rand(1, $d_count),
        		'room_number' => $faker->randomDigitNotNull,
        		'status' => (string)0
        	]);
        }
    }
}
