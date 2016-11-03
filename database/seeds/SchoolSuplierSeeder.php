<?php

use Illuminate\Database\Seeder;
use App\Unis\School\School;
use App\Unis\Suplier\Suplier;
use Carbon\Carbon;

class SchoolSuplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('school_suplier')->truncate();

        $supliers = Suplier::all();
        $schools = School::all();
        $count = $supliers->count();
        foreach ($schools as $school){
            $data['school_id'] = $school->id;
            $n = mt_rand(1, $count);
            $collects = $supliers->random($n);
            foreach ($collects->all() as $collect){
            	// var_dump($collect);exit;
                $data['suplier_id'] = $collect->id;
                // $data['created_at'] = Carbon::now();
                // $data['updated_at'] = Carbon::now();
                DB::table('school_suplier')->insert($data);                
            }
        }
    }
}
