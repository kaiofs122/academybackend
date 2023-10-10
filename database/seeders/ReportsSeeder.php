<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Report;

class ReportsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Report::create([
            'id_instructor' => '1',
            'id_student' => '1',
            'description_reports' => 'Você precisa treinar mais!',
        ]);
    }
}
