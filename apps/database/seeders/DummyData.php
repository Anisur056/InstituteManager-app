<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserInfoModel;
use App\Models\UserFileUploadModel;
use App\Models\UserAttendanceLogModel;

use App\Models\InstituteInfoModel;
use App\Models\InstituteAcademicYearsModel;
use App\Models\InstituteClassesModel;
use App\Models\InstituteShiftsModel;
use App\Models\InstituteSectionsModel;
use App\Models\InstituteSubjectModel;
use App\Models\InstituteGroupsModel;
use App\Models\InstituteExamTermsModel;

use App\Models\AttendanceDevicesModel;
use App\Models\SmsLogsModel;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DummyData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User
        $records = collect([
            [
                'name_en' => 'Anisur Rahman',
                'name_bn' => 'আনিসুর রহমান',
                'user_name' => 'anis',
                'password' => Hash::make('123'),
                'email' => 'anis14109@gmail.com',
                'role' => 'admin',
                'contact_sms' => '01871123427',
                'contact_whatsapp' => '01871123427',
                'sms_status' => 'active',
                'nid' => '4202555860',
                'birth_reg' => '',
                'date_of_birth' => '1997-12-01',
                'gender' => 'male',
                'blood_group' => 'A+',
                'health_issues' => '',
                'height' => '',
                'weight' => '',
                'marital_status' => '',
                'nationality' => '',
                'religion' => '',
                'present_address' => '',
                'permanent_address' => '',
                'rfid_card' => '',
                'profile_pic' => '',
                'signature' => '',
                'status' => 'active',
                'joined_at' => '2025-01-01',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_en' => 'Rofiqual Islam',
                'name_bn' => 'রফিকুল ইসলাম',
                'user_name' => 'rofiq',
                'password' => Hash::make('123'),
                'email' => '',
                'role' => 'admin',
                'contact_sms' => '',
                'contact_whatsapp' => '',
                'sms_status' => 'active',
                'nid' => '',
                'birth_reg' => '',
                'date_of_birth' => '',
                'gender' => 'male',
                'blood_group' => '',
                'health_issues' => '',
                'height' => '',
                'weight' => '',
                'marital_status' => '',
                'nationality' => '',
                'religion' => '',
                'present_address' => '',
                'permanent_address' => '',
                'rfid_card' => '',
                'profile_pic' => '',
                'signature' => '',
                'status' => 'active',
                'joined_at' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

            $records->each(function($data){
                User::insert($data);
            });

        

        // InstituteClassesModel
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
            'name_en' => 'Hifz Nazera',
            'name_bn' => 'হিফজ নাজেরা',
            'display_order' => 7,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name_en' => 'Hifz International',
            'name_bn' => 'হিফজ আন্তর্জাতিক',
            'display_order' => 8,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name_en' => 'Hifz Rivision',
            'name_bn' => 'হিফজ রিভিশন',
            'display_order' => 9,
            'created_at' => now(),
            'updated_at' => now(),
            ],
        ]);

            $records->each(function($data){
                InstituteClassesModel::insert($data);
            });

        // InstituteShiftsModel
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

        // $json = File::get('recordsbase/json/StudentModel.json');
        // $records = collect(json_decode($json));

        // $records->each(function($data){
        //     StudentModel::create([
        //         "0000" => $000->000,
        //     ]);
        // });

        // InstituteSubjectModel
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

        // InstituteAcademicYearsModel
        $records = collect([
            [
            'year_en' => '2024',
            'year_bn' => '২০২৪',
            'display_order' => 1,
            'created_at' => now(),
            'updated_at' => now(),
            ],

        ]);

            $records->each(function($data){
                InstituteAcademicYearsModel::insert($data);
            });


        // InstituteExamTermsModel
        $records = collect([
            [
            'name_en' => '1st Term Examination',
            'name_bn' => 'প্রথম সাময়িক পরিক্ষা',
            'display_order' => 1,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name_en' => '2nd Term Examination',
            'name_bn' => 'দ্বিতীয় সাময়িক পরিক্ষা',
            'display_order' => 2,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name_en' => 'Half Yearly Examination',
            'name_bn' => 'অর্ধ বার্ষিক পরিক্ষা',
            'display_order' => 3,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name_en' => 'Final Examination',
            'name_bn' => 'বার্ষিক পরিক্ষা',
            'display_order' => 4,
            'created_at' => now(),
            'updated_at' => now(),
            ],

        ]);

            $records->each(function($data){
                InstituteExamTermsModel::insert($data);
            });

        // InstituteGroupsModel
        $records = collect([
            [
            'name_en' => 'ALIF GROUP',
            'name_bn' => 'আলিফ গ্রুপ',
            'display_order' => 1,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name_en' => 'BAA GROUP',
            'name_bn' => 'বা গ্রুপ',
            'display_order' => 2,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name_en' => 'TAA GROUP',
            'name_bn' => 'তা গ্রুপ',
            'display_order' => 3,
            'created_at' => now(),
            'updated_at' => now(),
            ],

        ]);

            $records->each(function($data){
                InstituteGroupsModel::insert($data);
            });

        // AttendanceDevicesModel
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
