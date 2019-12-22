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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Questionnaire::class, function (Faker\generator $faker) {
   return [
       'title' => $faker->sentence,
       'description' => $faker->paragraph,
       'agreement' => $faker->paragraph,
       'status' => 0,
       'layout' => 0,
       'creator' => 1,
       'slug' => $faker->word,
   ];
});
