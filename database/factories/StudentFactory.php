<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Instructor;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_name' => $this->faker->unique()->word,
            'student_cpf' => $this->faker->unique()->numerify('###.###.###-##'),
            'student_email' => fake()->unique()->safeEmail(),
            'student_telephone' => $this->faker->phoneNumber,
            'student_date_birth' => $this->faker->date,
            'student_weight' => $this->faker->numerify('###'),
            'student_height' => $this->faker->randomFloat(2),
            'student_level' => $this->faker->unique()->word,
            'student_goal' => $this->faker->unique()->word,
            'id_instructor' => Instructor::pluck('id')->random(),
            'student_frequency' => $this->faker->unique()->word,
            'student_photo_url' => $this->faker->url,
            'student_address' => $this->faker->unique()->word,
            'student_address_number' => $this->faker->numerify('###'),
            'student_city' => $this->faker->unique()->word,
            'student_zip_code' => $this->faker->numerify('###.###-##'),
            'student_state' => $this->faker->unique()->word,
        ];
    }
}
