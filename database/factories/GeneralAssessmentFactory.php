<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\InstructorAssessment;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GeneralAssessment>
 */
class GeneralAssessmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_instructor_assessment' => InstructorAssessment::pluck('id')->random(),
            'assessment_count' => $this->faker->randomNumber(5),
            'average_stars' => $this->faker->randomNumber(5),
        ];
    }
}
