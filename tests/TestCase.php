<?php

namespace Tests;

use App\Entities\Role;
use App\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function login($role = Role::DEFAULT_ROLE) : User
    {
        $user = factory(User::class)->state($role)->create();
        $this->be($user);

        return $user;
    }
}
