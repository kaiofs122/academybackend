<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\NotificationInstructor;

class NotificationsInstructorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NotificationInstructor::create([
            'id_instructor' => '1',
            'text_notification' => 'Notificação de teste',
        ]);
    }
}
