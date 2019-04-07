<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['news_id', 'author_id', 'text'];

    public static function validations(): array
    {
        return [
            'text' => 'required'
        ];
    }
}