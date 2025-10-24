<?php

namespace Database\Seeders;

use App\Models\InstituteAcademicYearsModel;

use Illuminate\Database\Seeder;

class InstituteAcademicYearsSeeder extends Seeder
{
    public function run(): void
    {

        $records = collect([
            [
            'year_en' => '2024',
            'year_bn' => '২০২৪',
            'display_order' => 1,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'year_en' => '2025',
            'year_bn' => '২০২৫',
            'display_order' => 2,
            'created_at' => now(),
            'updated_at' => now(),
            ],

        ]);

        $records->each(function($data){
            InstituteAcademicYearsModel::insert($data);
        });

    }
}
