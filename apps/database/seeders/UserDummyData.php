<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserDummyData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(
            [
            'user_name' => 'anis14109',
            'full_name' => 'Anisur Rahman',
            'phone_number' => '01871123427',
            'email' => 'anis14109@gmail.com',
            'role' => 'admin',
            'password' => '14109',
            'pin' => '27272',
            ]
        );
    }
}
