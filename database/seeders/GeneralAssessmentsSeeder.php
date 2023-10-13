<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GeneralAssessment;

class GeneralAssessmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // GeneralAssessment::create([
        //     'id_instructor_assessment' => '1',
        //     'assessment_count' => '1',
        //     'average_stars' => '5',
        // ]);
        GeneralAssessment::factory(20)->create();
    }
}
