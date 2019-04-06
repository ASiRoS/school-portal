<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use Published;

    protected $fillable = ['name', 'is_published', 'filename', 'is_ebook'];
}