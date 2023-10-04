<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Exercise;

class ExerciseTest extends TestCase
{
    /** @test */
    public function check_if_exercise_columns_is_correct(): void
    {
        $exercise= new Exercise;

        $expected = [
            'exercise_name',
            'exercise_description',
            'exercise_url_picture'
        ];

        $arrayCompared = array_diff($expected, $exercise->getFillable());
        
        dd($arrayCompared);

        $this->assertEquals(0, count($arrayCompared));
    }
}

