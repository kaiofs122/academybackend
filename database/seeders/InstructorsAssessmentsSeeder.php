<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\InstructorAssessment;

class InstructorsAssessmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        InstructorAssessment::create([
            'id_instructor' => '1',
            'id_student' => '1',
            'amount_stars_didatic' => '5',
            'amount_stars_patience' => '4',
            'amount_stars_charisma' => '3',
        ]);
    }
}
