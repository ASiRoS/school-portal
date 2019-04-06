<?php

namespace Tests\Feature;

use App\Entities\News;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class NewsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function user_can_see_published_news()
    {
        $news = factory(News::class, 10)->state('published')->create();

        $response = $this->get('/news');

        $response->assertStatus(200);

        foreach($news as $article) {
            $response->assertSeeText($article->title);
            $response->assertSee($article->preview_image);
        }
    }

    /** @test */
    function user_can_not_see_published_news()
    {
        $news = factory(News::class, 10)->state('unpublished')->create();

        $response = $this->get('/news');

        $response->assertStatus(200);

        foreach($news as $article) {
            $response->assertDontSee($article->title);
        }
    }
}