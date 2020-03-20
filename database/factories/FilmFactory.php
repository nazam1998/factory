<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Film;
use Faker\Generator as Faker;

$factory->define(Film::class, function (Faker $faker) {
    return [
        'title'=>$faker->name,
        'year'=>$faker->year,
        'description'=>$faker->paragraph()
    ];
});
