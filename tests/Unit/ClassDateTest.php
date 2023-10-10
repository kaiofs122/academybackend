<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\ClassDate;

class ClassDateTest extends TestCase
{
    /** @test */
    public function check_if_class_date_columns_is_correct(): void
    {
        $classDate = new ClassDate;

        $expected = [
            'id_class',
            'class_hour',
            'class_start_time',
            'class_duration'
        ];

        $arrayCompared = array_diff($expected, $classDate->getFillable());

        $this->assertEquals(0, count($arrayCompared));
    }
}
