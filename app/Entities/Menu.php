<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use Published;

    protected $fillable = ['name', 'link', 'is_published'];
}