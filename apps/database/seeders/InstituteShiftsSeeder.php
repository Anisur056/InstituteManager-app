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
            'name_bn' => 'দিবা শাখা',
            'display_order' => 1,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name_en' => 'Day+Couching Shift',
            'name_bn' => 'দিবা+কোচিং শাখা',
            'display_order' => 2,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name_en' => 'Evening Shift',
            'name_bn' => 'সন্ধ্যাকালীন শাখা',
            'display_order' => 3,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name_en' => 'Residential Shift',
            'name_bn' => 'আবাসিক শাখা',
            'display_order' => 4,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name_en' => 'Non-resident Shift',
            'name_bn' => 'অনাবাসিক শাখা',
            'display_order' => 5,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name_en' => 'VIP Shift',
            'name_bn' => 'ভিআইপি শাখা',
            'display_order' => 6,
            'created_at' => now(),
            'updated_at' => now(),
            ],
        ]);

        $records->each(function($data){
            InstituteShiftsModel::insert($data);
        });

    }
}
