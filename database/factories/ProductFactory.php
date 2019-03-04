<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'description'=> $faker->sentence(10),
        'image'  => $faker->image(storage_path().'/images/')
        ];
});
