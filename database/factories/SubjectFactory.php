<?php

use App\Entities\Subject;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/** @var $factory Factory */
$factory->define(Subject::class, function (Faker $faker) {
    return [
        'title' => $faker->title
    ];
});
