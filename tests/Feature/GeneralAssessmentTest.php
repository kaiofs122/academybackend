<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GeneralAssessmentTest extends TestCase
{
    /** @test */
    public function general_assessment_listing_test(): void
    {
        $response = $this->get('/api/v1/generalAssessments');

        $response->assertStatus(200);
    }

    /** @test */
    public function general_assessment_data_submission_test()
    {
        $data = [
            'id_instructor_assessment' => '1',
            'assessment_count' => '1',
            'average_stars' => '5'
        ];

        $response = $this->post('/api/v1/generalAssessments', $data);

        $response->assertStatus(200);
    }
        
    /** @test */
    public function general_assessment_data_update_test()
    {
        $data = [
            'id_instructor_assessment' => '1',
            'assessment_count' => '2',
            'average_stars' => '3',
        ];

        $response = $this->put('/api/v1/generalAssessments/2', $data);
        
        $response->assertStatus(200);
    }

    /** @test */
    public function general_assessment_data_deletion_test()
    {
        $response = $this->delete('/api/v1/generalAssessments/3');

        $response->assertStatus(200);
    }
}
