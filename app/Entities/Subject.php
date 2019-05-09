<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['title', 'class_grades'];

    protected $casts = ['class_grades' => 'array'];

    public static function searchByClassGrade(ClassEntity $class)
    {
        $result = [];
        $subjects = self::all();

        foreach($subjects as $subject) {
            if(in_array($class->grade, $subject->class_grades)) {
                $result[] = $subject;
            }
        }

        return $result;
    }

    public static function validations(): array
    {
        return [
            'title' => 'required',
            'class_grades' => 'required'
        ];
    }

    public function getGradesAttribute(): string
    {
        return implode(', ', $this->class_grades);
    }
}