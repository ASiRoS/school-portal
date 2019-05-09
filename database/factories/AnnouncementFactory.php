<?php

use App\Entities\Announcement;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/** @var $factory Factory */
$factory->define(Announcement::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'description' => $faker->text
    ];
})->state(Announcement::class, 'published', [
    'is_published' => true
])->state(Announcement::class, 'unpublished', [
    'is_published' => false
]);

