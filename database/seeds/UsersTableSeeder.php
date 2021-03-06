<?php

use Illuminate\Database\Seeder;
use App\Unis\User\User;

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

        User::create([
        	'name' => 'superMan',
        	'role'=>'admin',
        	'email' => 'admin@unis.com',
        	'password' => bcrypt('123'),
            'avatar' => '/img/default-avatar.png',
            'status' => 1
        	]);
        User::create([
        	'name' => 'xiaoMing',
        	'role'=>'agent',
        	'email' => 'demo@demo.com',
        	'password' => bcrypt('123'),
            'avatar' => '/img/default-avatar.png',
            'status' => 1,
        	]);
        factory(User::class, 200)->create();      
    }
}
