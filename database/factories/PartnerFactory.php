<?php

use App\Entities\Partner;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/** @var $factory Factory */
$factory->define(Partner::class, function (Faker $faker) {
    return [
        'name' => $faker->title,
        'link' => $faker->address,
        'logo' => $faker->address
    ];
})->state(Partner::class, 'published', [
    'is_published' => true
])->state(Partner::class, 'unpublished', [
    'is_published' => false
]);
