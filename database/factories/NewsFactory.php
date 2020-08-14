<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use App\Model;
use App\News;
use Faker\Generator as Faker;

$factory->define(News::class, function (Faker $faker) {
    return [
        'category_id' => Category::pluck('id')->random(),
        'title_en' => $faker->name,
        'title_ru' => $faker->name,
        'title_hy' => $faker->name,
        'short_description_en' => $faker->text(50),
        'short_description_ru' => $faker->text(50),
        'short_description_hy' => $faker->text(50),
        'long_description_en' => $faker->realText(200),
        'long_description_ru' => $faker->realText(200),
        'long_description_hy' => $faker->realText(200),
        'view' => $faker->randomDigit,
        'avatar' => $faker->imageUrl($width = 890, $height = 610),
    ];
});
