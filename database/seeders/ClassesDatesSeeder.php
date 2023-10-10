<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ClassDate;

class ClassesDatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ClassDate::create([
            'id_class' => '1',
            'class_hour' => '12:00',
            'class_start_time' => '12:01',
            'class_duration' => '13:00',
        ]);
    }
}
