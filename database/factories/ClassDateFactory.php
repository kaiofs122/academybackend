<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ClassModel;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ClassDate>
 */
class ClassDateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_class' => ClassModel::pluck('id')->random(),
            'class_hour' => $this->faker->time,
            'class_start_time' => $this->faker->time,
            'class_duration' => $this->faker->time,
        ];
    }
}
