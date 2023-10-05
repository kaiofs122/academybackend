<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClassDateTest extends TestCase
{
    /** @test */
    public function class_date_listing_test(): void
    {
        $response = $this->get('/api/v1/classesDates');

        $response->assertStatus(200);
    }

    /** @test */
    public function class_date_data_submission_test()
    {
        $data = [
            'id_class' => '1',
            'class_hour' => '12:00',
            'class_start_time' => '12:01',
            'class_duration' => '13:00',
        ];

        $response = $this->post('/api/v1/classesDates', $data);

        $response->assertStatus(200);
    }
}