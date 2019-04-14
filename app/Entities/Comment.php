<?php

namespace App\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['news_id', 'author_id', 'text'];

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public static function validations(): array
    {
        return [
            'text' => 'required'
        ];
    }
}