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
            'name_en' => 'Campas-1 | Biswas Para',
            'name_bn' => 'ক্যাম্পাস-১ | বিশ্বাস পাড়া',
            'display_order' => 1,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'institute_info_name' => 'Sirikotia Hafezia Nurani Model Madrasha',
            'name_en' => 'Campas-2 | Ponchayet Bari',
            'name_bn' => 'ক্যাম্পাস-২ | পঞ্চায়েত বাড়ী',
            'display_order' => 2,
            'created_at' => now(),
            'updated_at' => now(),
            ]

        ]);

        $records->each(function($data){
            InstituteBranchModel::insert($data);
        });

    }
}
