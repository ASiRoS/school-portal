<?php

use App\Entities\ClassEntity;
use App\Entities\Homework;
use App\Entities\Subject;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/** @var $factory Factory */
$factory->define(Homework::class, function (Faker $faker) {
    return [
        'task' => $faker->title,
        'class_id' => \factory(ClassEntity::class)->create()->id,
        'subject_id' => \factory(Subject::class)->create()->id
    ];
});
