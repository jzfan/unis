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
        $this->call(FeedSeeder::class);
        // $this->call(RegionTableSeeder::class);
    }
}
