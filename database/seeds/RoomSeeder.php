<?php

use Illuminate\Database\Seeder;
use App\Unis\School\Room;
use App\Unis\School\Dorm;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Room::truncate();
        $dorms = Dorm::select('id')->get();

        foreach ($dorms as $dorm) {
        	foreach (range(20, 60) as $index) {
        		Room::create([
        			'dorm_id' => $dorm->id,
        			'number' => $index
        			]);
        	}
        }
    }
}
