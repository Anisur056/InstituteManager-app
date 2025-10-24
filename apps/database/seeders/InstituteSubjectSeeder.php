<?php

namespace Database\Seeders;

use App\Models\InstituteSubjectModel;

use Illuminate\Database\Seeder;

class InstituteSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $records = collect([
            [
            'name_en' => 'Bangla- 1st Paper',
            'name_bn' => 'বাংলা- ১ম পত্র',
            'display_order' => 1,
            'created_at' => now(),
            'updated_at' => now(),
            ],

        ]);

        $records->each(function($data){
            InstituteSubjectModel::insert($data);
        });

    }
}
