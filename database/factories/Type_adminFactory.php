<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Type_admin;
use Faker\Generator as Faker;

$factory->define(Type_admin::class, function (Faker $faker) {
    return [
        'name_en' => $faker->name,
        'name_ru' => $faker->name,
        'name_hy' => $faker->name,
    ];
});
