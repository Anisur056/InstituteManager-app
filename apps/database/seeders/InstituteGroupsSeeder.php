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
            'name_en' => 'Nazera Group',
            'name_bn' => 'নাজেরা গ্রুপ',
            'display_order' => 1,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name_en' => 'Hifz Group',
            'name_bn' => 'হিফজ গ্রুপ',
            'display_order' => 2,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name_en' => 'Rivision Group',
            'name_bn' => 'রিভিশন গ্রুপ',
            'display_order' => 3,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name_en' => 'Compitition Group',
            'name_bn' => 'প্রতিযোগিতা গ্রুপ',
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
