<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TrainingExercise;

class TrainingsExercisesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TrainingExercise::create([
            'id_training' => '1',
            'id_exercise' => '1',
            'training_exercises_repetitions' => '5',
            'training_exercises_series' => '10',
        ]);
    }
}
