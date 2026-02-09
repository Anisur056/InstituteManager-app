<?php

namespace Database\Seeders;

use App\Models\InstituteBranchModel;

use Illuminate\Database\Seeder;

class InstituteBranchesSeeder extends Seeder
{

    public function run(): void
    {

        $records = collect([
            [
            'institute_info_name' => 'Sirikotia Hafezia Nurani Model Madrasha',
            'name_en' => 'Biswas Para',
            'name_bn' => 'বিশ্বাস পাড়া',
            'display_order' => 1,
            'created_at' => now(),
            'updated_at' => now(),
            ]
        ]);

        $records->each(function($data){
            InstituteBranchModel::insert($data);
        });

    }
}
