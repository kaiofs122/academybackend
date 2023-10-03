<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Student;

class StudentTest extends TestCase
{
    /** @test */
    public function check_if_user_columns_is_correct(): void
    {
        $student = new Student;

        $expected = [
            "student_name",
            "student_cpf",
            "student_email",
            "student_telephone",
            "student_date_birth",
            "student_weight",
            "student_height",
            "student_level",
            "student_goal",
            "id_instructor",
            "student_frequency",
            "student_photo_url",
            "student_address",
            "student_address_number",
            "student_city",
            "student_zip_code",
            "student_state"
        ];

        $arrayCompared = array_diff($expected, $student->getFillable());
        
        dd($arrayCompared);

        $this->assertEquals(0, count($arrayCompared));
    }
}
