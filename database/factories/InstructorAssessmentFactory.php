<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Instructor;
use App\Models\Student;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InstructorAssessment>
 */
class InstructorAssessmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_instructor' => Instructor::pluck('id')->random(),
            'id_student' => Student::pluck('id')->random(),
            'amount_stars_didatic' =>  $this->faker->randomNumber(5),
            'amount_stars_patience' => $this->faker->randomNumber(5),
            'amount_stars_charisma' => $this->faker->randomNumber(5),
        ];
    }
}
