<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\NotificationStudent;

class NotificationsStudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NotificationStudent::create([
            'id_student' => '1',
            'text_notification' => 'Notificação de aluno',
        ]);
    }
}
