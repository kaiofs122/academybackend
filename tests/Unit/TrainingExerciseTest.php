<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\TrainingExercise;

class TrainingExerciseTest extends TestCase
{
    /** @test */
    public function check_if_user_columns_is_correct(): void
    {
        $trainingExercise = new TrainingExercise;

        $expected = [
            'id_training',
            'id_exercise',
            'training_repetitions',
            'training_series'
        ];

        $arrayCompared = array_diff($expected, $trainingExercise->getFillable());
        
        dd($arrayCompared);

        $this->assertEquals(0, count($arrayCompared));
    }
}
