<?php

namespace App\Entities;

use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{
    protected $fillable = ['task', 'class_id', 'subject_id', 'teacher_id'];

    public function scopeSearch(Builder $builder, Subject $subject, ClassEntity $class)
    {
        return $builder->where(['subject_id' => $subject->id, 'class_id' => $class->id]);
    }

    public static function validations(): array
    {
        return [
            'task' => 'required',
            'class_id' => 'required',
            'subject_id' => 'required',
        ];
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function class()
    {
        return $this->belongsTo(ClassEntity::class);
    }

    public function teacher()
    {
        return $this->belongsTo(User::class);
    }
}