<?php

namespace Database\Seeders;

use App\Models\InstituteShiftsModel;

use Illuminate\Database\Seeder;

class InstituteShiftsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $records = collect([
            [
            'name_en' => 'Day Shift',
            'name_bn' => 'দিনের শিফট/ দিবা শাখা',
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

        $records->each(function($data){
            InstituteShiftsModel::insert($data);
        });

    }
}
