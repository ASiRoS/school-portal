<?php

namespace App;

use App\Entities\ClassEntity;
use App\Entities\Role;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role', 'class_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setRole($role): void
    {
        if(!Role::roleExists($role)) {
            throw new BadRequestHttpException('Such role doesn\'t exist.');
        }

        $this->role = $role;
    }

    public static function validations($confirmed = true, ?User $user = null): array
    {
        $data = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'. $user->id ],
            'password' => ['required', 'string', 'min:8'],
        ];

        if($confirmed) {
            $data['password'][] = 'confirmed';
        }

        return $data;
    }

    public function class()
    {
        return $this->belongsTo(ClassEntity::class);
    }

    public function isStudent(): bool
    {
        return $this->role === 'student';
    }

    public function isTeacher(): bool
    {
        return $this->role === 'teacher';
    }

    public function isAdmin(): bool
    {
        return $this->role === 'director';
    }
}
