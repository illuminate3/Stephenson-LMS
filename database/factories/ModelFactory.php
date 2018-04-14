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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Entities\User::class, function (Faker\Generator $faker) {
    return [
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'user' => $faker->userName,
        'email' => $faker->unique()->safeEmail,
        'password' => "123",
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Entities\Followers::class, function (Faker\Generator $faker) {
    return [
        'follower' => App\Entities\User::all()->random()->id,
        'followed' => App\Entities\User::all()->random()->id,
    ];
});
