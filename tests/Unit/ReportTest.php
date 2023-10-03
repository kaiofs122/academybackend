<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Report;

class ReportTest extends TestCase
{
    /** @test */
    public function check_if_user_columns_is_correct(): void
    {
        $report = new Report;

        $expected = [
            'id_instructor',
            'id_student',
            'description_reports'
        ];

        $arrayCompared = array_diff($expected, $report->getFillable());
        
        dd($arrayCompared);

        $this->assertEquals(0, count($arrayCompared));
    }
}
