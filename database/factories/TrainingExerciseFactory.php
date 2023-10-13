<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Training;
use App\Models\Exercise;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TrainingExercise>
 */
class TrainingExerciseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_training' => Training::pluck('id')->random(),
            'id_exercise' => Exercise::pluck('id')->random(),
            'training_exercises_repetitions' => $this->faker->numerify('###'),
            'training_exercises_series' => $this->faker->numerify('###'),
        ];
    }
}
