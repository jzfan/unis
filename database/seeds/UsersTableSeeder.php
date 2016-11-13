<?php

use Illuminate\Database\Seeder;
use App\Unis\User\User;
use App\Unis\User\Address;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

     	User::truncate();
        Address::truncate();

        User::create([
        	'name' => 'superMan',
        	'role'=>'admin',
        	'email' => 'admin@unis.com',
        	'password' => bcrypt('123'),
            'avatar' => '/img/default-avatar.png',
            'status' => 1,
            'dorm_id' => 1,
            'room_number' => 1,
        	]);
        User::create([
        	'name' => 'xiaoMing',
        	'role'=>'agent',
        	'email' => 'demo@demo.com',
        	'password' => bcrypt('123'),
            'avatar' => '/img/default-avatar.png',
            'status' => 1,
            'dorm_id' =>2,
            'room_number' =>2
        	]);
        factory(User::class, 1000)->create();      
    }
}
