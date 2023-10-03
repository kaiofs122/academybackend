<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Training;

class TrainingTest extends TestCase
{
    /** @test */
    public function check_if_user_columns_is_correct(): void
    {
        $training = new Training;

        $expected = [
            'id_instructor',
            'id_student'
        ];

        $arrayCompared = array_diff($expected, $training->getFillable());
        
        dd($arrayCompared);

        $this->assertEquals(0, count($arrayCompared));
    }
}
