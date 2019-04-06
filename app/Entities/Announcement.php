<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use Published;

    protected $fillable = ['title', 'description', 'is_published'];
}