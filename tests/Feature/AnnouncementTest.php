<?php

namespace Tests\Feature;

use App\Entities\Announcement;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class AnnouncementTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function user_can_see_published_news()
    {
        $news = factory(Announcement::class, 10)->state('published')->create();

        $response = $this->get('/announcements');

        $response->assertStatus(200);

        foreach($news as $article) {
            $response->assertSeeText($article->title);
        }
    }

    /** @test */
    function user_can_not_see_published_news()
    {
        $news = factory(Announcement::class, 10)->state('unpublished')->create();

        $response = $this->get('/announcements');

        $response->assertStatus(200);

        foreach($news as $article) {
            $response->assertDontSee($article->title);
        }
    }
}