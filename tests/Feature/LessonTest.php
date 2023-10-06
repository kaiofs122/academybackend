<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LessonTest extends TestCase
{
    /** @test */
    public function lesson_listing_test(): void
    {
        $response = $this->get('/api/v1/lessons');

        $response->assertStatus(200);
    }

    /** @test */
    public function lesson_data_submission_test()
    {
        $data = [
            'id_instructor' => '1',
            'lesson_description' => 'Lição',
            'lesson_max_students' => '5',
        ];

        $response = $this->post('/api/v1/lessons', $data);

        $response->assertStatus(200);
    }
    
    /** @test */
    public function lesson_data_update_test()
    {
        $data = [
            'id_instructor' => '2',
            'lesson_description' => 'Lição teste',
            'lesson_max_students' => '50',
        ];

        $response = $this->put('/api/v1/lessons/2', $data);
        
        $response->assertStatus(200);
    }

    /** @test */
    public function lesson_data_deletion_test()
    {
        $response = $this->delete('/api/v1/lessons/3');

        $response->assertStatus(200);
    }
}
