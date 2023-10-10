<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::create([
            'student_name' => 'lucas',
            'student_cpf' => '465123798',
            'student_email' => 'lucas@hotmail.com',
            'student_telephone' => '364197852',
            'student_date_birth' => '02/02/2000',
            'student_weight' => '60kg',
            'student_height' => '1.70',
            'student_level' => 'iniciante',
            'student_goal' => 'Hipertrofia',
            'id_instructor' => '1',
            'student_frequency' => 'regular',
            'student_photo_url' => 'ainda não há',
            'student_address' => 'Rua não necessária',
            'student_address_number' => '00',
            'student_city' => 'Irecê',
            'student_zip_code' => '44900-000',
            'student_state' => 'Bahia',
        ]);
    }
}
