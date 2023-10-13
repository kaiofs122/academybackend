<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Instructor;

class InstructorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Instructor::create([
        //     'instructor_name' => 'Kaio2',
        //     'instructor_cpf' => '123654789-2',
        //     'instructor_telephone' => '582643197-2',
        //     'instructor_email' => 'kaio@hotmail.com2',
        //     'instructor_date_birth' => '01/01/2006',
        //     'instructor_time_arrival' => '9:01',
        //     'instructor_time_exit' => '12:01',
        //     'instructor_address' => 'Rua não necessária',
        //     'instructor_address_number' => '05',
        //     'instructor_city' => 'Irecê',
        //     'instructor_zip_code' => '44900-000',
        //     'instructor_state' => 'Bahia',
        // ]);
        Instructor::factory(20)->create();
    }
}
