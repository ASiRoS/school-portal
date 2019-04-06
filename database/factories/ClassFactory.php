<?php

use App\Entities\ClassEntity;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/** @var  $factory Factory */
$factory->define(ClassEntity::class, function (Faker $faker) {
    return [
        'name' => $faker->name
    ];
});
