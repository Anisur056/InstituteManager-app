<?php

namespace Database\Seeders;

use App\Models\AttendanceDevicesModel;

use Illuminate\Database\Seeder;

class AttendanceDevicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $records = collect([
            [
            'name' => 'Zkteco K40',
            'ip' => '192.168.1.201',
            'port' => 4370,
            'version' => '',
            'osVersion' => '',
            'platform' => '',
            'fmVersion' => '',
            'workCode' => '',
            'ssr' => '',
            'pinWidth' => '',
            'serialNumber' => '',
            'deviceName' => '',
            ]
        ]);

        $records->each(function($data){
            AttendanceDevicesModel::insert($data);
        });

    }
}
