<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Instructor>
 */
class InstructorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'instructor_name' => $this->faker->unique()->word,
            'instructor_cpf' => $this->faker->unique()->numerify('###.###.###-##'),
            'instructor_telephone' => $this->faker->phoneNumber,
            'instructor_email' => fake()->unique()->safeEmail(),
            'instructor_date_birth' => $this->faker->date,
            'instructor_time_arrival' => $this->faker->time,
            'instructor_time_exit' => $this->faker->time,
            'instructor_address' => $this->faker->unique()->word,
            'instructor_address_number' => $this->faker->numerify('###'),
            'instructor_city' => $this->faker->unique()->sentence(),
            'instructor_zip_code' => $this->faker->numerify('###.###-##'),
            'instructor_state' => $this->faker->word,
        ];
    }
}
