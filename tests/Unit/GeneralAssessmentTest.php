<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\GeneralAssessment;

class GeneralAssessmentTest extends TestCase
{
    /** @test */
    public function check_if_generalAssessment_columns_is_correct(): void
    {
        $generalAssessment= new GeneralAssessment;

        $expected = [
            'assessment_count',
            'average_stars'
        ];

        $arrayCompared = array_diff($expected, $generalAssessment->getFillable());
        
        dd($arrayCompared);

        $this->assertEquals(0, count($arrayCompared));
    }
}
