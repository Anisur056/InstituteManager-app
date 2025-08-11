<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Tbl_shift;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(
            [
            'user_name' => 'anis',
            'full_name' => 'Anisur Rahman',
            'phone_number' => '01871123427',
            'email' => 'anis14109@gmail.com',
            'role' => 'admin',
            'password' => '27272',
            'profile_pic' => 'assets/admin/images/profile/anis.jpg',
            ]
        );

        Tbl_shift::create(
            [
            'shift_name_en' => 'Day Shift',
            'shift_name_bn' => 'দিনের শিফট/বিদা শাখা',
            'display_order' => 1,
            ]
        );
    }
}
