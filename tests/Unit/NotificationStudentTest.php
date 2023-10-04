<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\NotificationStudent;

class NotificationStudentTest extends TestCase
{
    /** @test */
    public function check_if_notificationStudent_columns_is_correct(): void
    {
        $notificationStudent= new NotificationStudent;

        $expected = [
            'id_student',
            'text_notification'
        ];

        $arrayCompared = array_diff($expected, $notificationStudent->getFillable());
        
        dd($arrayCompared);

        $this->assertEquals(0, count($arrayCompared));
    }
}
