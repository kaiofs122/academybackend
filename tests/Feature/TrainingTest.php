<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TrainingTest extends TestCase
{
    /** @test */
    public function training_listing_test(): void
    {
        $response = $this->get('/api/v1/trainings');

        $response->assertStatus(200);
    }

    /** @test */
    public function training_data_submission_test()
    {
        $data = [
            'id_instructor' => '1',
            'id_student' => '1',
        ];

        $response = $this->post('/api/v1/trainings', $data);

        $response->assertStatus(200);
    }
    /** @test */
    public function training_data_update_test()
    {
        $data = [
            'id_instructor' => '2',
            'id_student' => '2',
        ];

        $response = $this->put('/api/v1/trainings/2', $data);
        
        $response->assertStatus(200);
    }

    /** @test */
    public function training_data_deletion_test()
    {
        $response = $this->delete('/api/v1/trainings/3');

        $response->assertStatus(200);
    }
}
