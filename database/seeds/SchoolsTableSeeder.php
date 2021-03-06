<?php

use Illuminate\Database\Seeder;
use App\Unis\School\School;
use App\Unis\School\Campus;

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
        Campus::truncate();

        factory(School::class, 5)->create();
    }
}
