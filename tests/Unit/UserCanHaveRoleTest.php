<?php

namespace Tests\Unit;

use App\Entities\Role;
use App\User;
use Tests\TestCase;

class UserCanHaveRoleTest extends TestCase
{
    /** @test */
    function user_can_have_different_roles()
    {
        $roles = Role::getRoles();

        foreach($roles as $role) {
            $user = factory(User::class)->make([
                'role' => $role
            ]);

            $this->assertEquals($role, $user->role);
        }
    }
}