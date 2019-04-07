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

    /** @test */
    function user_can_comment_news()
    {
        $this->login();

        $article = factory(News::class)->state('published')->create();

        $data = ['text' => 'Hello, I am John.'];

        $response = $this->post("/news/{$article->id}/comment", $data);

        $response->assertStatus(302);
        $response->assertRedirect("/news/{$article->id}");

        $response = $this->get("/news/{$article->id}");

        $response->assertSeeText($data['text']);
    }
}