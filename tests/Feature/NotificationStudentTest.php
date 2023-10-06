<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NotificationStudentTest extends TestCase
{
    /** @test */
    public function notification_student_listing_test(): void
    {
        $response = $this->get('/api/v1/notificationsStudents');

        $response->assertStatus(200);
    }

    /** @test */
    public function notification_student_data_submission_test()
    {
        $data = [
            'id_student' => '1',
            'text_notification' => 'Notificação',
        ];

        $response = $this->post('/api/v1/notificationsStudents', $data);

        $response->assertStatus(200);
    }
    /** @test */
    public function notification_student_data_update_test()
    {
        $data = [
            'id_student' => '2',
            'text_notification' => 'Notificação2',
        ];

        $response = $this->put('/api/v1/notificationsStudents/2', $data);
        
        $response->assertStatus(200);
    }

    /** @test */
    public function notification_student_data_deletion_test()
    {
        $response = $this->delete('/api/v1/notificationsStudents/3');

        $response->assertStatus(200);
    }
}
