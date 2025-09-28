<?php

namespace Database\Seeders;

use App\Models\InstituteAcademicYearModel;
use Illuminate\Database\Seeder;

class AcademicYear extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $records = collect([
            [
            'year_en' => '2025',
            'year_bn' => '২০২৫',
            'display_order' => 1,
            'created_at' => now(),
            'updated_at' => now(),
            ],
        ]);

        $records->each(function($data){
            InstituteAcademicYearModel::insert($data);
        });
    }
}
