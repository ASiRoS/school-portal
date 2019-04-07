<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class ClassEntity extends Model
{
    protected $table = 'classes';

    protected $fillable = ['letter', 'grade'];

    public function getNameAttribute()
    {
        return $this->letter . $this->grade;
    }
}