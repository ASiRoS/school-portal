<?php

use App\Entities\Grade;
use App\Entities\Subject;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/** @var $factory Factory */
$factory->define(Grade::class, function (Faker $faker) {
    return [
        'mark' => random_int(1, 5),
        'note' => $faker->text,
        'teacher_id' => \factory(User::class)->state('teacher')->create()->id,
        'student_id' => \factory(User::class)->state('student')->create()->id,
        'subject_id' => \factory(Subject::class)->create()->id,
        'assign_date' => $faker->date(),
    ];
});
