<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NotificationInstructorTest extends TestCase
{
    /** @test */
    public function notification_instructor_listing_test(): void
    {
        $response = $this->get('/api/v1/notificationsInstructors');

        $response->assertStatus(200);
    }

    /** @test */
    public function notification_instructor_data_submission_test()
    {
        $data = [
            'id_instructor' => '1',
            'text_notification' => 'Notificação',
        ];

        $response = $this->post('/api/v1/notificationsInstructors', $data);

        $response->assertStatus(200);
    }
}
