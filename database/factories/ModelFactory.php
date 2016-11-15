<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/
use Lvht\GeoHash;
use App\Unis\School\Dorm;

$factory->define(App\Unis\User\User::class, function (Faker\Generator $faker) {
    $count = Dorm::all()->count();
    static $password;
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'avatar' => $faker->imageUrl(100, 100),
        'phone' => (string)mt_rand(13111111111,18888888888),
        'remember_token' => str_random(10),
        'status' => (string)mt_rand(0 ,1)
    ];
});

$factory->define(App\Unis\User\Address::class, function (Faker\Generator $faker) {
$faker = Faker\Factory::create('zh_CN');

    return [
            'school_id' => mt_rand(1, 5),
           'mark' => $faker->latitude . ' | ' . $faker->longitude,
           'province' => $faker->state,
           'city' => $faker->city,
           'block' => $faker->streetName,
           'addr1' => $faker->streetAddress,
           'addr2' => $faker->streetAddress,
         	 'status' => (string)mt_rand(0 ,1)
    ];
});

$factory->define(App\Unis\School\School::class, function (Faker\Generator $faker) {
$faker = Faker\Factory::create('zh_CN');
$city = $faker->city;
$x = $faker->longitude;
$y = $faker->latitude;
    return [
           'province' => $faker->state,
           'city' => $city,
           'block' => $faker->streetName,
           'name' => $city . $faker->randomDigit . '大学',
           'address' => $faker->streetAddress,
           'x' => $x,
           'y' => $y,
  'geohash' => GeoHash::encode($x, $y),
          'status' => (string)mt_rand(0 ,1)
    ];
});

$factory->define(App\Unis\School\Campus::class, function (Faker\Generator $faker) {
$x = $faker->longitude;
$y = $faker->latitude;
    return [
           'name' => $faker->name . '校区',
           'address' => $faker->streetAddress,
           'x' => $x,
           'y' => $y,
           'geohash' => GeoHash::encode($x, $y),
          'status' => (string)mt_rand(0 ,1)
    ];
});

$factory->define(App\Unis\School\Canteen::class, function (Faker\Generator $faker) {
$x = $faker->longitude;
$y = $faker->latitude;
    return [
          'name' => $faker->word . '食堂',
          'address' => $faker->streetAddress,
           'x' => $x,
           'y' => $y,
           'geohash' => GeoHash::encode($x, $y),
    ];
});

$factory->define(App\Unis\School\Dorm::class, function (Faker\Generator $faker) {
  $x = $faker->longitude;
$y = $faker->latitude;
    return [
          'name' => $faker->word . '宿舍',
          'address' => $faker->streetAddress,
           'x' => $x,
           'y' => $y,
           'geohash' => GeoHash::encode($x, $y),
    ];
});

$factory->define(App\Unis\Suplier\Suplier::class, function (Faker\Generator $faker) {
$faker = Faker\Factory::create('zh_CN');

    return [
            'company' => $faker->company,
            'email' => $faker->unique()->safeEmail,
            'tel' => $faker->e164PhoneNumber,
            'manager' => $faker->name,
            'address' => $faker->streetAddress,
            'status' => (string)mt_rand(0 ,1)
    ];
});

