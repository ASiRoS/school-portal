<?php

use App\Entities\ClassEntity;
use Illuminate\Database\Eloquent\Factory;

/** @var  $factory Factory */

$factory->define(ClassEntity::class, function() {
    $alphabet = range('a', 'z');

    return [
        'letter' => $alphabet[random_int(0, 25)],
        'grade'  => random_int(1, 11),
    ];
});
