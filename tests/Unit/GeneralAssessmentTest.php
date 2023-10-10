<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\GeneralAssessment;

class GeneralAssessmentTest extends TestCase
{
    /** @test */
    public function check_if_general_assessment_columns_is_correct(): void
    {
        $generalAssessment = new GeneralAssessment;

        $expected = [
            'id_instructor_assessment',
            'assessment_count',
            'average_stars'
        ];

        $arrayCompared = array_diff($expected, $generalAssessment->getFillable());

        $this->assertEquals(0, count($arrayCompared));
    }
}
