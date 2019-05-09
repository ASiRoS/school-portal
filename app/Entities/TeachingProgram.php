<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class TeachingProgram extends Model
{
    protected $fillable = ['class_grade', 'subject_id', 'program'];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function scopeSearch(Builder $builder, Subject $subject, int $grade): Builder
    {
        return $builder->where(['subject_id' => $subject, 'class_grade' => $grade]);
    }

    public static function validations(): array
    {
        return [
            'class_grade' => 'required',
            'subject_id'  => 'required',
            'program'     => 'required',
        ];
    }
}