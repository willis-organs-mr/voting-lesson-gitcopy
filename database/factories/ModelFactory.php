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
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'trusted' => 0,
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\CommunityLink::class, function (Faker\Generator $faker) {
    static $password;
    // gives you a place to define a blueprint for a factory model
    return [
        'user_id' => factory('App\User')->create()->id,
        'channel_id' => 1,
        'title' => $faker->sentence,
        'link' => $faker->url,
        'approved' => 0
    ];
});
