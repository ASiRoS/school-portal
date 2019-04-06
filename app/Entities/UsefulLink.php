<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class UsefulLink extends Model
{
    use Published;

    protected $fillable = ['title', 'is_published', 'description', 'link'];
}