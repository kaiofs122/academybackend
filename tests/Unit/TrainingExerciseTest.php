<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\TrainingExercise;

class TrainingExerciseTest extends TestCase
{
    /** @test */
    public function check_if_training_exercise_columns_is_correct(): void
    {
        $trainingExercise = new TrainingExercise;

        $expected = [
            'id_training',
            'id_exercise',
            'training_exercises_repetitions',
            'training_exercises_series'
        ];

        $arrayCompared = array_diff($expected, $trainingExercise->getFillable());
       
        $this->assertEquals(0, count($arrayCompared));
    }
}
