<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{
    protected $fillable = ['task', 'class_id', 'subject_id'];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function class()
    {
        return $this->belongsTo(ClassEntity::class);
    }
}