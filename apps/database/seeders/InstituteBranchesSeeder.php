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
            'institute_info_id' => 1,
            'name_en' => 'Campas 1 | Hazi Dorbesh Ali Bari',
            'name_bn' => 'ক্যাম্পাস ১ | হাজী দরবেশ আলী বাড়ি',
            'display_order' => 1,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'institute_info_id' => 1,
            'name_en' => 'Campas 2 | Chowdhury Villa',
            'name_bn' => 'ক্যাম্পাস ২ | চৌধুরী ভিলা',
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
