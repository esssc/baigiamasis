<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'surname'=>$faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'phone'=>$faker->phoneNumber,
        'password' => 'labas1', // secret
        'remember_token' => str_random(10),
    ];
});
