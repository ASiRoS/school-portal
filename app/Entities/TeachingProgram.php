<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class TeachingProgram extends Model
{
    protected $fillable = ['class_grade', 'subject_id', 'program'];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}