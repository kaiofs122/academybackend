<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClassTest extends TestCase
{
    /** @test */
    public function class_listing_test(): void
    {
        $response = $this->get('/api/v1/classes');

        $response->assertStatus(200);
    }

    /** @test */
    public function class_data_submission_test()
    {
        $data = [
            'id_lesson' => '1',
            'id_student' => '1',
        ];

        $response = $this->post('/api/v1/classes', $data);

        $response->assertStatus(200);
    }

        /** @test */
        public function class_data_update_test()
        {
            $data = [
                'id_lesson' => '2',
                'id_student' => '2',
            ];
    
            $response = $this->put('/api/v1/classes/4', $data);
            
            $response->assertStatus(200);
        }
    
        /** @test */
        public function class_data_deletion_test()
        {
            $response = $this->delete('/api/v1/classes/3');
    
            $response->assertStatus(200);
        }
}
