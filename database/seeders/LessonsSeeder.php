<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lesson;

class LessonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Lesson::create([
        //     'id_instructor' => '1',
        //     'lesson_description' => 'Teste de lição',
        //     'lesson_max_students' => '10',
        // ]);
        Lesson::factory(20)->create();
    }
}
