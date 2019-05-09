<?php

namespace Tests\Feature;

use App\Entities\Homework;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class HomeworkTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function user_see_grades()
    {
        $homeworks = factory(Homework::class, 10)->create();

        $response = $this->get('/homeworks');

        $response->assertStatus(200);

        foreach($homeworks as $homework) {
            $response->assertSeeText($homework->task);
            $response->assertSeeText($homework->class->name);
            $response->assertSeeText($homework->subject->title);
        }
    }
}