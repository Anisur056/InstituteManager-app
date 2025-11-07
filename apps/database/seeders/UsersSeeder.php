<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $records = collect([
            [
                'name' => 'Rofiqual Islam',
                'name_bn' => 'রফিকুল ইসলাম',
                'password' => Hash::make('123'),
                'email' => 'sirikotiamadrasha@gmail.com',
                'role' => 'admin',
                'contact_sms' => '01892178778',
                'contact_whatsapp' => '01892178778',
                'sms_status' => 'on',
                'nid' => '',
                'birth_reg' => '',
                'date_of_birth' => '',
                'gender' => 'male',
                'blood_group' => '',
                'health_issues' => '',
                'height' => '',
                'weight' => '',
                'marital_status' => 'married',
                'nationality' => '',
                'religion' => '',
                'present_address' => '',
                'permanent_address' => '',
                'rfid_card' => '2577534',
                'profile_pic' => 'img/users/rofiq.png',
                'signature' => '',
                'status' => 'active',
                'joined_at' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Anisur Rahman',
                'name_bn' => 'আনিসুর রহমান',
                'password' => Hash::make('123'),
                'email' => 'anis14109@gmail.com',
                'role' => 'admin',
                'contact_sms' => '01871123427',
                'contact_whatsapp' => '01871123427',
                'sms_status' => 'on',
                'nid' => '4202555860',
                'birth_reg' => '',
                'date_of_birth' => '1997-12-01',
                'gender' => 'male',
                'blood_group' => 'A+',
                'health_issues' => '',
                'height' => '',
                'weight' => '',
                'marital_status' => 'married',
                'nationality' => '',
                'religion' => '',
                'present_address' => '',
                'permanent_address' => '',
                'rfid_card' => '2577217',
                'profile_pic' => 'img/users/anis.png',
                'signature' => '',
                'status' => 'active',
                'joined_at' => '2025-01-01',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Nurun Nabi',
                'name_bn' => 'নুরুন নবী',
                'password' => Hash::make('123'),
                'email' => 'nurnabi@gmail.com',
                'role' => 'admin',
                'contact_sms' => '01621986417',
                'contact_whatsapp' => '01621986417',
                'sms_status' => 'on',
                'nid' => '',
                'birth_reg' => '',
                'date_of_birth' => '',
                'gender' => 'male',
                'blood_group' => '',
                'health_issues' => '',
                'height' => '',
                'weight' => '',
                'marital_status' => 'single',
                'nationality' => '',
                'religion' => '',
                'present_address' => '',
                'permanent_address' => '',
                'rfid_card' => '2569950',
                'profile_pic' => 'img/users/nurnabi.png',
                'signature' => '',
                'status' => 'active',
                'joined_at' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

         $records->each(function($data){
            User::insert($data);
        });

    }
}
