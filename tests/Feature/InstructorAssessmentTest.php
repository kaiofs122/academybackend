<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InstructorAssessmentTest extends TestCase
{
    /** @test */
    public function instructor_assessment_listing_test(): void
    {
        $response = $this->get('/api/v1/InstructorsAssessments');

        $response->assertStatus(200);
    }

    /** @test */
    public function instructor_assessment_data_submission_test()
    {
        $data = [
            'id_instructor' => '1',
            'id_student' => '1',
            'amount_stars_didatic' => '5',
            'amount_stars_patience' => '4',
            'amount_stars_charisma' => '3'
        ];

        $response = $this->post('/api/v1/InstructorsAssessments', $data);

        $response->assertStatus(200);
    }
        
    /** @test */
    public function instructor_assessment_data_update_test()
    {
        $data = [
            'id_instructor' => '1',
            'id_student' => '1',
            'amount_stars_didatic' => '4',
            'amount_stars_patience' => '2',
            'amount_stars_charisma' => '1'
        ];

        $response = $this->put('/api/v1/InstructorsAssessments/1', $data);
        
        $response->assertStatus(200);
    }

    /** @test */
    public function instructor_assessment_data_deletion_test()
    {
        $response = $this->delete('/api/v1/InstructorsAssessments/3');

        $response->assertStatus(200);
    }
}
