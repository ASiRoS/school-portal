<?php

use App\Entities\Menu;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/** @var $factory Factory */
$factory->define(Menu::class, function (Faker $faker) {
    return [
        'name' => $faker->title,
        'link' => $faker->address,
    ];
})->state(Menu::class, 'published', [
    'is_published' => true
])->state(Menu::class, 'unpublished', [
    'is_published' => false
]);
