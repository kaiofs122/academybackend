<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::create([
        //     'user_email' => 'teste@hotmail.com',
        //     'user_password' => bcrypt('12345678'),
        // ]);
        User::factory(20)->create();
    }
}
