<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StudentTest extends TestCase
{
    /** @test */
    public function student_listing_test(): void
    {
        $response = $this->get('/api/v1/students');

        $response->assertStatus(200);
    }

    /** @test */
    public function student_data_submission_test()
    {
        $data = [
            'student_name' => 'lucas',
            'student_cpf' => '465123798',
            'student_email' => 'lucas@hotmail.com',
            'student_telephone' => '364197852',
            'student_date_birth' => '02/02/2000',
            'student_weight' => '60kg',
            'student_height' => '1.70',
            'student_level' => 'iniciante',
            'student_goal' => 'Hipertrofia',
            'id_instructor' => '1',
            'student_frequency' => 'regular',
            'student_photo_url' => 'ainda não há',
            'student_address' => 'Rua não necessária',
            'student_address_number' => '00',
            'student_city' => 'Irecê',
            'student_zip_code' => '44900-000',
            'student_state' => 'Bahia',
        ];

        $response = $this->post('/api/v1/students', $data);

        $response->assertStatus(200);
    }
    /** @test */
    public function student_data_update_test()
    {
        $data = [
            'student_name' => 'lucas2',
            'student_cpf' => '465123798-2',
            'student_email' => 'lucas@hotmail.com2',
            'student_telephone' => '364197852-2',
            'student_date_birth' => '02/02/2001',
            'student_weight' => '61kg',
            'student_height' => '1.71',
            'student_level' => 'iniciante2',
            'student_goal' => 'Hipertrofia2',
            'id_instructor' => '2',
            'student_frequency' => 'regular2',
            'student_photo_url' => 'ainda não há2',
            'student_address' => 'Rua não necessária2',
            'student_address_number' => '01',
            'student_city' => 'Irecê',
            'student_zip_code' => '44900-000',
            'student_state' => 'Bahia',
        ];

        $response = $this->put('/api/v1/students/2', $data);
        
        $response->assertStatus(200);
    }

    /** @test */
    public function student_data_deletion_test()
    {
        $response = $this->delete('/api/v1/students/4');

        $response->assertStatus(200);
    }
}
