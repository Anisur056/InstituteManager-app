<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Tbl_institute;
use App\Models\Tbl_academic_year;
use App\Models\Tbl_shift;
use App\Models\Tbl_classe;
use App\Models\Tbl_section;
use App\Models\Tbl_exam_term;
use App\Models\Tbl_group;
use App\Models\StudentModel;
use App\Models\Tbl_employee;
use App\Models\Tbl_finger_Device;
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
        // `users` records
        $records = collect([
            [
            'user_name' => 'anis',
            'full_name' => 'Anisur Rahman',
            'phone_number' => '01871123427',
            'email' => 'anis14109@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('27272'),
            'profile_pic' => 'assets/admin/img/users/anis.jpg',
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'user_name' => 'rofiq',
            'full_name' => 'Rofiqul Islam',
            'phone_number' => '',
            'email' => '',
            'role' => 'admin',
            'password' => Hash::make('123'),
            'profile_pic' => '',
            'created_at' => now(),
            'updated_at' => now(),
            ]
        ]);

        $records->each(function($data){
            User::insert($data);
        });

        // `tbl_classes` records
        $records = collect([
            [
            'name_en' => 'PLAY',
            'name_bn' => 'প্লে',
            'display_order' => 1,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name_en' => 'NURSERY',
            'name_bn' => 'নার্সারী',
            'display_order' => 2,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name_en' => 'ONE',
            'name_bn' => 'প্রথম',
            'display_order' => 3,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name_en' => 'TWO',
            'name_bn' => 'দ্বিতীয়',
            'display_order' => 4,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name_en' => 'THREE',
            'name_bn' => 'তৃতীয়',
            'display_order' => 5,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name_en' => 'FOUR',
            'name_bn' => 'চতুর্থ',
            'display_order' => 6,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name_en' => 'HIFZ-NAZERA',
            'name_bn' => 'হিফজ নাজেরা',
            'display_order' => 7,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name_en' => 'HIFZ-INTERNATIONAL',
            'name_bn' => 'হিফজ আন্তর্জাতিক',
            'display_order' => 8,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name_en' => 'HIFZ-RIVISION',
            'name_bn' => 'হিফজ রিভিশন',
            'display_order' => 9,
            'created_at' => now(),
            'updated_at' => now(),
            ],
        ]);

        $records->each(function($data){
            Tbl_classe::insert($data);
        });

        // Tbl_shift records
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
            Tbl_shift::insert($data);
        });

        // Tbl_section records
        // $records = collect([
        //     [

        //     ],
        // ]);

        // $records->each(function($data){
        //     Tbl_section::insert($data);
        // });

        // `StudentModel` records
        $json = File::get('recordsbase/json/StudentModel.json');
        $records = collect(json_decode($json));

        $records->each(function($data){
            StudentModel::create([
                "status" => $data->status,
                "enrolled_date"=> $data->enrolled_date,
                "profile_pic"=> $data->profile_pic,
                "academic_year"=> $data->academic_year,
                "institute_name"=> $data->institute_name,
                "shift"=> $data->shift,
                "class"=> $data->class,
                "section"=> $data->section,
                "group"=> $data->group,
                "roll"=> $data->roll,
                "name_bn"=> $data->name_bn,
                "name_en"=> $data->name_en,
                "date_of_birth"=> $data->date_of_birth,
                "birth_reg"=> $data->birth_reg,
                "nid"=> $data->nid,
                "gender"=> $data->gender,
                "religion"=> $data->religion,
                "blood_group"=> $data->blood_group,
                "health_issues"=> $data->health_issues,
                "height"=> $data->height,
                "weight"=> $data->weight,
                "nationality"=> $data->nationality,
                "contact_sms"=> $data->contact_sms,
                "contact_whatsapp"=> $data->contact_whatsapp,
                "contact_email"=> $data->contact_email,
                "present_address"=> $data->present_address,
                "permanent_address"=> $data->permanent_address,
                "father_name_en"=> $data->father_name_en,
                "father_name_bn"=> $data->father_name_bn,
                "father_contact"=> $data->father_contact,
                "father_occupation"=> $data->father_occupation,
                "father_birth_reg"=> $data->father_birth_reg,
                "father_nid"=> $data->father_nid,
                "father_income"=> $data->father_income,
                "mother_name_en"=> $data->mother_name_en,
                "mother_name_bn"=> $data->mother_name_bn,
                "mother_contact"=> $data->mother_contact,
                "mother_occupation"=> $data->mother_occupation,
                "mother_birth_reg"=> $data->mother_birth_reg,
                "mother_nid"=> $data->mother_nid,
                "mother_income"=> $data->mother_income,
                "local_guardian_name_en"=> $data->local_guardian_name_en,
                "local_guardian_name_bn"=> $data->local_guardian_name_bn,
                "local_guardian_relation"=> $data->local_guardian_relation,
                "local_guardian_contact"=> $data->local_guardian_contact,
                "local_guardian_nid"=> $data->local_guardian_nid,
                "local_guardian_address"=> $data->local_guardian_address,
                "emergency_contact_name"=> $data->emergency_contact_name,
                "emergency_contact_relation"=> $data->emergency_contact_relation,
                "emergency_contact_contact"=> $data->emergency_contact_contact,
                "emergency_contact_address"=> $data->emergency_contact_address,
                "previous_institute"=> $data->previous_institute,
                "previous_institute_address"=> $data->previous_institute_address,
                "previous_institute_tc_number"=> $data->previous_institute_tc_number,
                "previous_institute_tc_date"=> $data->previous_institute_tc_date,
                "remark"=> $data->remark,
                "created_at"=> $data->created_at,
                "updated_at"=> $data->updated_at,
            ]);
        });

        // `Tbl_employee` records
        $records = collect([
            [
            // 'name_en' => '',
            // 'created_at' => now(),
            // 'updated_at' => now(),
            ],
        ]);

        $records->each(function($data){
            Tbl_employee::insert($data);
        });

        // `Tbl_exam_term` records
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
            Tbl_exam_term::insert($data);
        });

        // `Tbl_group` records
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
            Tbl_group::insert($data);
        });

        // Finger Device Info
        $records = collect([
            [
            'name' => 'Zkteco K40',
            'ip' => '192.168.1.201',
            'port' => 4370,
            'serialNumber' => '',
            ]
        ]);

        $records->each(function($data){
            Tbl_finger_Device::insert($data);
        });

    }
}
