<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Instructor;

class InstructorTest extends TestCase
{
    /** @test */
    public function check_if_user_columns_is_correct(): void
    {
        $instructor = new Instructor;

        $expected = [
            "instructor_name",
            "instructor_cpf",
            "instructor_telephone",
            "instructor_email",
            "instructor_date_birth",
            "instructor_time_arrival",
            "instructor_time_exit",
            "instructor_address",
            "instructor_address_number",
            "instructor_city",
            "instructor_zip_code",
            "instructor_state"
        ];

        $arrayCompared = array_diff($expected, $instructor->getFillable());
        
        dd($arrayCompared);

        $this->assertEquals(0, count($arrayCompared));
    }
}
