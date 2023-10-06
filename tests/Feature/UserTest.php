<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /** @test */
    public function user_listing_test(): void
    {
        $response = $this->get('/api/v1/users');

        $response->assertStatus(200);
    }

    /** @test */
    public function user_data_submission_test()
    {
        $data = [
            'user_email' => 'user2@user.com',
            'user_password' => '123456',
        ];

        $response = $this->post('/api/v1/users', $data);

        $response->assertStatus(200);
    }
    
    /** @test */
    public function user_data_update_test()
    {
        $data = [
            'user_email' => 'user2@user.com2',
            'user_password' => '123456-2',
        ];

        $response = $this->put('/api/v1/users/1', $data);
        
        $response->assertStatus(200);
    }

    /** @test */
    public function user_data_deletion_test()
    {
        $response = $this->delete('/api/v1/users/7');

        $response->assertStatus(200);
    }
}
