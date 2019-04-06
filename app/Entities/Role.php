<?php

namespace App\Entities;

final class Role
{
    private const ROLES = [
        'director',
        'teacher',
        'student',
        'user',
    ];

    public const DEFAULT_ROLE = 'user';

    public static function roleExists(string $role): bool
    {
        return in_array($role, self::ROLES);
    }

    public static function getRoles(): array
    {
        return self::ROLES;
    }
}