<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TrainingExerciseTest extends TestCase
{
    /** @test */
    public function training_exercise_listing_test(): void
    {
        $response = $this->get('/api/v1/trainingsExercises');

        $response->assertStatus(200);
    }

    /** @test */
    public function training_exercise_data_submission_test()
    {
        $data = [
            'id_training' => '1',
            'id_exercise' => '1',
            'training_exercises_repetitions' => '5',
            'training_exercises_series' => '10',
        ];

        $response = $this->post('/api/v1/trainingsExercises', $data);

        $response->assertStatus(200);
    }
}
