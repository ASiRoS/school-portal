<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use Published;

    protected $fillable = ['title', 'description', 'preview_image', 'is_published'];
}