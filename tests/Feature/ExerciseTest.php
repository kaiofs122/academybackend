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
    public function exercise_data_submission_test()
    {
        $data = [
            'exercise_name' => 'Exercício',
            'exercise_description' => 'Descrição',
            'exercise_url_tutorial' => 'Teste',
        ];

        $response = $this->post('/api/v1/exercises', $data);

        $response->assertStatus(200);
    }
    
        /** @test */
        public function exercise_data_update_test()
        {
            $data = [
                'exercise_name' => 'Exercício2',
                'exercise_description' => 'Descrição2',
                'exercise_url_tutorial' => 'Teste2',
            ];
    
            $response = $this->put('/api/v1/exercises/2', $data);
            
            $response->assertStatus(200);
        }
    
        /** @test */
        public function exercise_data_deletion_test()
        {
            $response = $this->delete('/api/v1/exercises/3');
    
            $response->assertStatus(200);
        }
}
