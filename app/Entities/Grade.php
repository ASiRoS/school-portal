<?php

namespace App\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable = ['mark', 'note', 'assign_date', 'teacher_id', 'student_id'];

    protected $dates = ['assign_date'];

    public function teacher()
    {
        return $this->belongsTo(User::class);
    }

    public function student()
    {
        return $this->belongsTo(User::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}