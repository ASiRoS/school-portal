<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use Published;

    protected $fillable = ['name', 'link', 'logo', 'is_published'];
}