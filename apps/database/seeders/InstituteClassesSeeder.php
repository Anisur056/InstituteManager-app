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
            [
            'name_en' => 'Hifz-One',
            'name_bn' => 'হিফজ-প্রথম',
            'display_order' => 8,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name_en' => 'Hifz-Two',
            'name_bn' => 'হিফজ-দ্বিতীয়',
            'display_order' => 9,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name_en' => 'Hifz-Three',
            'name_bn' => 'হিফজ-তৃতীয়',
            'display_order' => 10,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name_en' => 'Hifz-Four',
            'name_bn' => 'হিফজ-চতুর্থ',
            'display_order' => 11,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name_en' => 'Moktob Program',
            'name_bn' => 'মক্তব প্রোগ্রাম',
            'display_order' => 12,
            'created_at' => now(),
            'updated_at' => now(),
            ],
        ]);

        $records->each(function($data){
            InstituteClassesModel::insert($data);
        });

    }
}
