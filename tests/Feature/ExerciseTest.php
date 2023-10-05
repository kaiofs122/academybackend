<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ExerciseTest extends TestCase
{
    /** @test */
    public function exercise_listing_test(): void
    {
        $response = $this->get('/api/v1/exercises');

        $response->assertStatus(200);
    }

    /** @test */
    public function texercise_data_submission_test()
    {
        $data = [
            'exercise_name' => 'Exercício',
            'exercise_description' => 'Descrição',
            'exercise_url_tutorial' => 'Teste',
        ];

        $response = $this->post('/api/v1/exercises', $data);

        //$response->dumpHeaders();

        //$response->dumpSession();

        //$response->dump();

        $response->assertStatus(200);
    }
}
