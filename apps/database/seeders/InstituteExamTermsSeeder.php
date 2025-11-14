<?php

namespace Database\Seeders;

use App\Models\InstituteExamTermsModel;

use Illuminate\Database\Seeder;

class InstituteExamTermsSeeder extends Seeder
{
    public function run(): void
    {

        $records = collect([
            [
            'name_en' => 'MODEL TEST EXAM',
            'name_bn' => 'মডেল টেষ্ট পরিক্ষা',
            'display_order' => 4,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name_en' => 'FIRST TERM EXAM',
            'name_bn' => 'প্রথম সাময়িক পরিক্ষা',
            'display_order' => 1,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name_en' => 'SECOND TERM EXAM',
            'name_bn' => 'দ্বিতীয় সাময়িক পরিক্ষা',
            'display_order' => 2,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name_en' => 'HALF YEAR EXAM',
            'name_bn' => 'অর্ধ বার্ষিক পরিক্ষা',
            'display_order' => 3,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name_en' => 'FINAL YEAR EXAM',
            'name_bn' => 'বার্ষিক পরিক্ষা',
            'display_order' => 4,
            'created_at' => now(),
            'updated_at' => now(),
            ],

        ]);

        $records->each(function($data){
            InstituteExamTermsModel::insert($data);
        });

    }
}
