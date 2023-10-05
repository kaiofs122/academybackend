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
}
