<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;

class Schedule extends Model
{
    protected $fillable = ['class_id', 'day', 'subjects', 'time'];
    protected $casts = ['subjects' => 'array', 'is_published' => 'boolean'];

    public static function validations(): array
    {
        return [
            'class_id' => 'required',
            'day' => 'required|integer',
            'subjects' => 'required'
        ];
    }

    public function class()
    {
        return $this->belongsTo(ClassEntity::class);
    }

    public function getDayAttribute($day)
    {
        return Day::getDay($day)->getTitle();
    }

    /**
     * @param Subject|int $subject
     * @return bool
     */
    public function hasSubject($subject): bool
    {
        if(!is_int($subject)) {
            if(is_object($subject) && $subject instanceof Subject) {
                $subject = $subject->id;
            } else {
                throw new InvalidArgumentException('$subject must be type of integer or Subject.');
            }
        }

        return in_array($subject, (array) $this->subjects);
    }

    public function getSubjects()
    {
        $subjects = Subject::find((array) $this->subjects);

        return $subjects;
    }
}