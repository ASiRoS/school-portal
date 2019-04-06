<?php

namespace Tests\Feature;

use App\Entities\Grade;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class GradeTest extends TestCase
{
    use DatabaseMigrations;

    private $gradeFields = ['mark', 'note', 'assign_date',];

    /** @test */
    function user_see_grades()
    {
        $grades = factory(Grade::class, 10)->create();

        $response = $this->get('/grades');

        $response->assertStatus(200);

        foreach($grades as $grade) {
            foreach($this->gradeFields as $field) {
                $response->assertSeeText($grade->$field);
            }

            $response->assertSeeText($grade->subject->title);
        }
    }
}