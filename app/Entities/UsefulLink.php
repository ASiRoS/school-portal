<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class UsefulLink extends Model
{
    use Published;

    protected $fillable = ['title', 'description', 'link', 'is_published'];

    public static function validations(): array
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'link' => 'required',
        ];
    }
}