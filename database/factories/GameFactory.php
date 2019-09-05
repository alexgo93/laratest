<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Game;
use Illuminate\Support\Str;
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

$factory->define(Game::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->title,
        'description' => $faker->text($faker->numberBetween(20, 30)),
        'complexity' => $faker->numberBetween(1, 9),
        'isActive' => $faker->numberBetween(0, 1),
    ];
});
