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
		'username' => $faker->word,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'about_me' => $faker->realtext(200),
        'profil_pic' => $faker->imageUrl($width = 300, $height = 300),
        'is_mod' => $faker->boolean($chanceOfGettingTrue = 30),
        'is_admin' => $faker->boolean($chanceOfGettingTrue = 20),
        'is_private' => $faker->boolean($chanceOfGettingTrue = 50),
        'remember_token' => str_random(10),
		'created_at' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),		
    ];
});
