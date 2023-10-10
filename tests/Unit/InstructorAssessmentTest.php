<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\InstructorAssessment;

class InstructorAssessmentTest extends TestCase
{
    /** @test */
    public function check_if_instructor_assessment_columns_is_correct(): void
    {
        $instructorAssessment = new InstructorAssessment;

        $expected = [
            'id_instructor',
            'id_student',
            'amount_stars_didatic',
            'amount_stars_patience',
            'amount_stars_charisma'
        ];

        $arrayCompared = array_diff($expected, $instructorAssessment->getFillable());

        $this->assertEquals(0, count($arrayCompared));
    }
}
