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
            'assessment_count' => '1',
            'average_stars' => '5',
        ];

        $response = $this->post('/api/v1/generalAssessments', $data);

        $response->assertStatus(200);
    }
}
