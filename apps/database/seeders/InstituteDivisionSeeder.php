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
            'name_en' => 'Nurani Division',
            'name_bn' => 'নূরানী বিভাগ',
            'display_order' => 1,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name_en' => 'Hifz Division',
            'name_bn' => 'হিফজ বিভাগ',
            'display_order' => 2,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name_en' => 'Moktob Programme',
            'name_bn' => 'মক্তব প্রোগ্রাম',
            'display_order' => 3,
            'created_at' => now(),
            'updated_at' => now(),
            ],
        ]);

        $records->each(function($data){
            InstituteDivisionModel::insert($data);
        });

    }
}
