<?php

namespace Tests\Feature;

use App\Entities\Menu;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class MenuTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function user_can_see_visible_menus()
    {
        factory(Menu::class, 10)->state('published')->create();

        $response = $this->get('/');

        $response->assertStatus(200);

        $publishedMenus = Menu::published()->get();

        foreach($publishedMenus as $menu) {
            $response->assertSeeText($menu->title);
            $response->assertSee($menu->link);
        }
    }

    /** @test */
    function user_can_not_see_unvisible_menus()
    {
        factory(Menu::class)->state('unpublished')->create();

        $response = $this->get('/');

        $response->assertStatus(200);

        $publishedMenus = Menu::all();

        foreach($publishedMenus as $menu) {
            $response->assertDontSee($menu);
        }
    }
}
