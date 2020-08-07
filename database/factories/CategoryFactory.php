<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name_en' => $faker->name,
        'name_ru' => $faker->name,
        'name_hy' => $faker->name,
    ];
});
