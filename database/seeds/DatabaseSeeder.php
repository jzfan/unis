<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->sql();
    }

    private function fake()
    {
        $this->call(SchoolsTableSeeder::class);
        $this->call(SupliersTableSeeder::class);
        $this->call(SchoolSuplierSeeder::class);
        $this->call(CampusSeeder::class);
        $this->call(ShopsTableSeeder::class);
        $this->call(FoodsTableSeeder::class);
        $this->call(RoomSeeder::class);
        $this->call(UsersTableSeeder::class);
        // $this->call(FavoriteSeeder::class);
        $this->call(AddressSeeder::class);
        $this->call(OrderSeeder::class);
        // $this->call(TestSeeder::class);
        $this->call(FeedSeeder::class);
        // $this->call(RegionTableSeeder::class);
    }

    private function sql()
    {
        $arr = ['schools', 'supliers', 'campuses', 'shops', 'foods', 'dorms', 'canteens'];
        $base_path = storage_path('app/sql/'); 

        foreach($arr as $t){
            // $this->command->info(file_get_contents($base_path.$t.'.sql'));
            \DB::unprepared(file_get_contents($base_path.$t.'.sql'));
            $this->command->info($t.' table seeded!');
        }
    }
}
