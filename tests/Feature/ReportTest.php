<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReportTest extends TestCase
{
    /** @test */
    public function report_listing_test(): void
    {
        $response = $this->get('/api/v1/reports');

        $response->assertStatus(200);
    }

    /** @test */
    public function report_data_submission_test()
    {
        $data = [
            'id_instructor' => '1',
            'id_student' => '1',
            'description_reports' => 'Você precisa treinar mais!',
        ];

        $response = $this->post('/api/v1/reports', $data);

        $response->assertStatus(200);
    }
    /** @test */
    public function report_data_update_test()
    {
        $data = [
            'id_instructor' => '2',
            'id_student' => '2',
            'description_reports' => 'Você precisa treinar menos!',
        ];

        $response = $this->put('/api/v1/reports/2', $data);
        
        $response->assertStatus(200);
    }

    /** @test */
    public function report_data_deletion_test()
    {
        $response = $this->delete('/api/v1/reports/3');

        $response->assertStatus(200);
    }
}
