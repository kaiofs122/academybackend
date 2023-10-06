<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InstructorTest extends TestCase
{
    /** @test */
    public function instructor_listing_test(): void
    {
        $response = $this->get('/api/v1/instructors');

        $response->assertStatus(200);
    }

    /** @test */
    public function instructor_data_submission_test()
    {
        $data = [
            'instructor_name' => 'Kaio',
            'instructor_cpf' => '123654789',
            'instructor_telephone' => '582643197',
            'instructor_email' => 'kaio@hotmail.com',
            'instructor_date_birth' => '01/01/2005',
            'instructor_time_arrival' => '9:00',
            'instructor_time_exit' => '12:00',
            'instructor_address' => 'Rua não necessária',
            'instructor_address_number' => '00',
            'instructor_city' => 'Irecê',
            'instructor_zip_code' => '44900-000',
            'instructor_state' => 'Bahia',
        ];

        $response = $this->post('/api/v1/instructors', $data);

        $response->assertStatus(200);
    }

    /** @test */
    public function instructor_data_update_test()
    {
        $data = [
            'instructor_name' => 'Kaio2',
            'instructor_cpf' => '123654789-2',
            'instructor_telephone' => '582643197-2',
            'instructor_email' => 'kaio@hotmail.com2',
            'instructor_date_birth' => '01/01/2006',
            'instructor_time_arrival' => '9:01',
            'instructor_time_exit' => '12:01',
            'instructor_address' => 'Rua não necessária',
            'instructor_address_number' => '05',
            'instructor_city' => 'Irecê',
            'instructor_zip_code' => '44900-000',
            'instructor_state' => 'Bahia',
        ];

        $response = $this->put('/api/v1/instructors/2', $data);
        
        $response->assertStatus(200);
    }

    /** @test */
    public function instructor_data_deletion_test()
    {
        $response = $this->delete('/api/v1/instructors/3');

        $response->assertStatus(200);
    }
}
