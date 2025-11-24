<?php

namespace Database\Seeders;

use App\Models\InstituteGroupsModel;

use Illuminate\Database\Seeder;

class InstituteGroupsSeeder extends Seeder
{
    public function run(): void
    {

        $records = collect([
            [
            'name_en' => 'Nazera',
            'name_bn' => 'নাজেরা',
            'display_order' => 1,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name_en' => 'Hifz',
            'name_bn' => 'হিফজ',
            'display_order' => 2,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name_en' => 'Rivision',
            'name_bn' => 'রিভিশন',
            'display_order' => 3,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name_en' => 'Compitition',
            'name_bn' => 'প্রতিযোগিতা',
            'display_order' => 3,
            'created_at' => now(),
            'updated_at' => now(),
            ],

        ]);

        $records->each(function($data){
            InstituteGroupsModel::insert($data);
        });

    }
}
