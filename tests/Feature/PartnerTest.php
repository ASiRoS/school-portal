<?php

namespace Tests\Feature;

use App\Entities\Partner;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class PartnerTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function user_can_see_visible_partners()
    {
        $partners = factory(Partner::class, 10)->state('published')->create();

        $response = $this->get('/partners');

        $response->assertStatus(200);

        foreach($partners as $partner) {
            $response->assertSee($partner->name);
            $response->assertSee($partner->link);
        }
    }

    /** @test */
    function user_can_not_see_invisible_partners()
    {
        factory(Partner::class)->state('unpublished')->create();

        $response = $this->get('/');

        $response->assertStatus(200);

        $partners = Partner::all();

        foreach($partners as $partner) {
            $response->assertDontSee($partner->name);
        }
    }
}