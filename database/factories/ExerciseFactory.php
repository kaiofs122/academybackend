<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Exercise>
 */
class ExerciseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'exercise_name' => $this->faker->unique()->sentence(),
            'exercise_description' => $this->faker->text,
            'exercise_url_tutorial' => $this->faker->url,
        ];
    }
}
