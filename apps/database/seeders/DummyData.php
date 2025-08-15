<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Tbl_institute;
use App\Models\Tbl_academic_year;
use App\Models\Tbl_classe;
use App\Models\Tbl_shift;
use App\Models\Tbl_section;
use App\Models\Tbl_student;
use App\Models\Tbl_employee;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DummyData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // `users` Data
        $data = collect([
            [
            'user_name' => 'anis',
            'full_name' => 'Anisur Rahman',
            'phone_number' => '01871123427',
            'email' => 'anis14109@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('27272'),
            'profile_pic' => 'assets/admin/img/users/anis.jpg',
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'user_name' => 'rofiq',
            'full_name' => 'Rofiqul Islam',
            'phone_number' => '',
            'email' => '',
            'role' => 'admin',
            'password' => Hash::make('123'),
            'profile_pic' => '',
            'created_at' => now(),
            'updated_at' => now(),
            ]
        ]);

        $data->each(function($single){
            User::insert($single);
        });

        // `tbl_institutes` Data
        $institutes = collect([
            [
            'name_en' => 'Sirikotia Hafezia Nurani Model Madrasha',
            'name_bn' => 'ছিরিকোটিয়া হাফেজিয়া নূরানী মডেল মাদ্রাসা',
            'address_en' => 'Biswash Para, kattoli, Akborsha, CTG',
            'address_bn' => 'বিশ্বাসপাড়া আগ্রাবাদ চট্টগ্রাম',
            'eiin_number' => '',
            'mobile' => '',
            'email' => '',
            'website' => '',
            'logo' => '',
            'map' => '',
            'display_order' => 1,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name_en' => 'AMN Islamia Madrasha',
            'name_bn' => 'এএমএন ইসলামিয়া মাদ্রাসা',
            'address_en' => 'Lotifpur, Akborsha, CTG',
            'address_bn' => 'লতিফপুর, আকবরশাহ্, চট্টগ্রাম',
            'eiin_number' => '',
            'mobile' => '',
            'email' => '',
            'website' => '',
            'logo' => '',
            'map' => '',
            'display_order' => 2,
            'created_at' => now(),
            'updated_at' => now(),
            ]
        ]);


        $institutes->each(function($institute_single){
            Tbl_institute::insert($institute_single);
        });


        // `tbl_academic_years` Data
        $data = collect([
            [
            'year_en' => '2025',
            'year_bn' => '২০২৫',
            'display_order' => 1,
            'created_at' => now(),
            'updated_at' => now(),
            ],
        ]);

        $data->each(function($single){
            Tbl_academic_year::insert($single);
        });

        // `tbl_classes` Data
        $data = collect([
            [
            'name_en' => 'PLAY',
            'name_bn' => 'প্লে',
            'display_order' => 1,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name_en' => 'NURSERY',
            'name_bn' => 'নার্সারী',
            'display_order' => 2,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name_en' => 'ONE',
            'name_bn' => 'প্রথম',
            'display_order' => 3,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name_en' => 'TWO',
            'name_bn' => 'দ্বিতীয়',
            'display_order' => 4,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name_en' => 'THREE',
            'name_bn' => 'তৃতীয়',
            'display_order' => 5,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name_en' => 'FOUR',
            'name_bn' => 'চতুর্থ',
            'display_order' => 6,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name_en' => 'HIFZ NAZERA',
            'name_bn' => 'হিফজ নাজেরা',
            'display_order' => 7,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name_en' => 'HIFZ INTERNATIONAL',
            'name_bn' => 'হিফজ আন্তর্জাতিক',
            'display_order' => 8,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name_en' => 'HIFZ RIVISION',
            'name_bn' => 'হিফজ রিভিশন',
            'display_order' => 9,
            'created_at' => now(),
            'updated_at' => now(),
            ],
        ]);

        $data->each(function($single){
            Tbl_classe::insert($single);
        });

        // Tbl_shift Data
        $data = collect([
            [
            'name_en' => 'Day Shift',
            'name_bn' => 'দিনের শিফট/বিদা শাখা',
            'display_order' => 1,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name_en' => 'Moktob Shift',
            'name_bn' => 'মক্তব শাখা',
            'display_order' => 2,
            'created_at' => now(),
            'updated_at' => now(),
            ]
        ]);

        $data->each(function($single){
            Tbl_shift::insert($single);
        });

        // Tbl_section Data
        // $data = collect([
        //     [

        //     ],
        // ]);

        // $data->each(function($single){
        //     Tbl_section::insert($single);
        // });

        // `Tbl_student` Data
        $data = collect([
            [
            // 'name_en' => '',
            // 'created_at' => now(),
            // 'updated_at' => now(),
            ],
        ]);

        $data->each(function($single){
            Tbl_student::insert($single);
        });

        // `Tbl_employee` Data
        $data = collect([
            [
            // 'name_en' => '',
            // 'created_at' => now(),
            // 'updated_at' => now(),
            ],
        ]);

        $data->each(function($single){
            Tbl_employee::insert($single);
        });

    }
}
