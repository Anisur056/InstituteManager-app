<?php

namespace Database\Seeders;

use App\Models\InstituteClassesModel;

use Illuminate\Database\Seeder;


class InstituteClassesSeeder extends Seeder
{
    public function run(): void
    {

        $records = collect([
            [
            'name_en' => 'Play',
            'name_bn' => 'প্লে',
            'display_order' => 1,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name_en' => 'Nursery',
            'name_bn' => 'নার্সারী',
            'display_order' => 2,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name_en' => 'One',
            'name_bn' => 'প্রথম',
            'display_order' => 3,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name_en' => 'Two',
            'name_bn' => 'দ্বিতীয়',
            'display_order' => 4,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name_en' => 'Three',
            'name_bn' => 'তৃতীয়',
            'display_order' => 5,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name_en' => 'Four',
            'name_bn' => 'চতুর্থ',
            'display_order' => 6,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name_en' => 'Five',
            'name_bn' => 'পঞ্চম',
            'display_order' => 7,
            'created_at' => now(),
            'updated_at' => now(),
            ],
        ]);

        $records->each(function($data){
            InstituteClassesModel::insert($data);
        });

    }
}
