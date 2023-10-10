<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Exercise;

class ExercisesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Exercise::create([
            'exercise_name' => 'Exercício',
            'exercise_description' => 'Descrição',
            'exercise_url_tutorial' => 'Teste',
        ]);
    }
}
