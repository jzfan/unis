<?php

use Illuminate\Database\Seeder;
use App\Unis\Suplier\Suplier;
use App\Unis\School\School;

class SupliersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Suplier::truncate();

        factory(Suplier::class, 10)->create();
    }
}
