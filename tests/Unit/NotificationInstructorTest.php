<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\NotificationInstructor;

class NotificationInstructorTest extends TestCase
{
    /** @test */
    public function check_if_user_columns_is_correct(): void
    {
        $notificationInstructor= new NotificationInstructor;

        $expected = [
            'id_instructor',
            'text_notification'
        ];

        $arrayCompared = array_diff($expected, $notificationInstructor->getFillable());
        
        dd($arrayCompared);

        $this->assertEquals(0, count($arrayCompared));
    }
}
