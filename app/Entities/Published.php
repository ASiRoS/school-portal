<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Builder;

trait Published
{
    public function scopePublished(Builder $builder)
    {
        return $builder->where(['is_published' => true]);
    }
}