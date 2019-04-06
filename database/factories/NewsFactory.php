<?php

use App\Entities\News;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/** @var $factory Factory */
$factory->define(News::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'description' => $faker->text,
        'preview_image' => $faker->address
    ];
})->state(News::class, 'published', [
    'is_published' => true
])->state(News::class, 'unpublished', [
    'is_published' => false
]);
