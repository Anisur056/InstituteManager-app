<?php

namespace Database\Seeders;

use App\Models\InstituteDivisionModel;

use Illuminate\Database\Seeder;


class InstituteDivisionSeeder extends Seeder
{
    public function run(): void
    {

        $records = collect([
            [
            'name_en' => 'General Division',
            'name_bn' => 'সাধারণ বিভাগ',
            'display_order' => 1,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name_en' => 'Nurani Division',
            'name_bn' => 'নূরানী বিভাগ',
            'display_order' => 2,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name_en' => 'Ebtedayee Division',
            'name_bn' => 'ইবতেদায়ি বিভাগ',
            'display_order' => 3,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name_en' => 'Hifz Division',
            'name_bn' => 'হিফজ বিভাগ',
            'display_order' => 4,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name_en' => 'Moktob Programme',
            'name_bn' => 'মক্তব প্রোগ্রাম',
            'display_order' => 5,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name_en' => 'Adult Quran Education Programme',
            'name_bn' => 'বয়স্ক কোরআন শিক্ষা প্রোগ্রাম',
            'display_order' => 6,
            'created_at' => now(),
            'updated_at' => now(),
            ],
        ]);

        $records->each(function($data){
            InstituteDivisionModel::insert($data);
        });

    }
}
