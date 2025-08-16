<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Tbl_shift;
use App\Models\Tbl_classe;
use App\Models\Tbl_section;
use App\Models\Tbl_exam_term;
use App\Models\Tbl_student;
use App\Models\Tbl_employee;
use App\Models\Tbl_institute;
use Illuminate\Database\Seeder;

use App\Models\Tbl_academic_year;
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
        // `users` Data
        $data = collect([
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

        $data->each(function($single){
            User::insert($single);
        });

        // `tbl_institutes` Data
        $institutes = collect([
            [
            'name_en' => 'Sirikotia Hafezia Nurani Model Madrasha',
            'name_bn' => 'ছিরিকোটিয়া হাফেজিয়া নূরানী মডেল মাদ্রাসা',
            'address_en' => 'Biswash Para, kattoli, Akborsha, CTG',
            'address_bn' => 'বিশ্বাসপাড়া আগ্রাবাদ চট্টগ্রাম',
            'eiin_number' => '',
            'mobile' => '',
            'email' => '',
            'website' => '',
            'logo' => '',
            'map' => '',
            'display_order' => 1,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name_en' => 'AMN Islamia Madrasha',
            'name_bn' => 'এএমএন ইসলামিয়া মাদ্রাসা',
            'address_en' => 'Lotifpur, Akborsha, CTG',
            'address_bn' => 'লতিফপুর, আকবরশাহ্, চট্টগ্রাম',
            'eiin_number' => '',
            'mobile' => '',
            'email' => '',
            'website' => '',
            'logo' => '',
            'map' => '',
            'display_order' => 2,
            'created_at' => now(),
            'updated_at' => now(),
            ]
        ]);


        $institutes->each(function($institute_single){
            Tbl_institute::insert($institute_single);
        });


        // `tbl_academic_years` Data
        $data = collect([
            [
            'year_en' => '2025',
            'year_bn' => '২০২৫',
            'display_order' => 1,
            'created_at' => now(),
            'updated_at' => now(),
            ],
        ]);

        $data->each(function($single){
            Tbl_academic_year::insert($single);
        });

        // `tbl_classes` Data
        $data = collect([
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
            'name_en' => 'HIFZ NAZERA',
            'name_bn' => 'হিফজ নাজেরা',
            'display_order' => 7,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name_en' => 'HIFZ INTERNATIONAL',
            'name_bn' => 'হিফজ আন্তর্জাতিক',
            'display_order' => 8,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name_en' => 'HIFZ RIVISION',
            'name_bn' => 'হিফজ রিভিশন',
            'display_order' => 9,
            'created_at' => now(),
            'updated_at' => now(),
            ],
        ]);

        $data->each(function($single){
            Tbl_classe::insert($single);
        });

        // Tbl_shift Data
        $data = collect([
            [
            'name_en' => 'Day Shift',
            'name_bn' => 'দিনের শিফট/বিদা শাখা',
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

        $data->each(function($single){
            Tbl_shift::insert($single);
        });

        // Tbl_section Data
        // $data = collect([
        //     [

        //     ],
        // ]);

        // $data->each(function($single){
        //     Tbl_section::insert($single);
        // });

        // `Tbl_student` Data
        $json = File::get('database/json/Tbl_students.json');
        $data = collect(json_decode($json));

        $data->each(function($single){
            Tbl_student::create([
                "status" => $single->status,
                "enrolled_date"=> $single->enrolled_date,
                "profile_pic"=> $single->profile_pic,
                "academic_year"=> $single->academic_year,
                "institute_name"=> $single->institute_name,
                "shift"=> $single->shift,
                "class"=> $single->class,
                "section"=> $single->section,
                "group"=> $single->group,
                "roll"=> $single->roll,
                "name_bn"=> $single->name_bn,
                "name_en"=> $single->name_en,
                "date_of_birth"=> $single->date_of_birth,
                "birth_reg"=> $single->birth_reg,
                "nid"=> $single->nid,
                "gender"=> $single->gender,
                "religion"=> $single->religion,
                "blood_group"=> $single->blood_group,
                "health_issues"=> $single->health_issues,
                "height"=> $single->height,
                "weight"=> $single->weight,
                "nationality"=> $single->nationality,
                "contact_sms"=> $single->contact_sms,
                "contact_whatsapp"=> $single->contact_whatsapp,
                "contact_email"=> $single->contact_email,
                "present_address"=> $single->present_address,
                "permanent_address"=> $single->permanent_address,
                "father_name_en"=> $single->father_name_en,
                "father_name_bn"=> $single->father_name_bn,
                "father_contact"=> $single->father_contact,
                "father_occupation"=> $single->father_occupation,
                "father_birth_reg"=> $single->father_birth_reg,
                "father_nid"=> $single->father_nid,
                "father_income"=> $single->father_income,
                "mother_name_en"=> $single->mother_name_en,
                "mother_name_bn"=> $single->mother_name_bn,
                "mother_contact"=> $single->mother_contact,
                "mother_occupation"=> $single->mother_occupation,
                "mother_birth_reg"=> $single->mother_birth_reg,
                "mother_nid"=> $single->mother_nid,
                "mother_income"=> $single->mother_income,
                "local_guardian_name_en"=> $single->local_guardian_name_en,
                "local_guardian_name_bn"=> $single->local_guardian_name_bn,
                "local_guardian_relation"=> $single->local_guardian_relation,
                "local_guardian_contact"=> $single->local_guardian_contact,
                "local_guardian_nid"=> $single->local_guardian_nid,
                "local_guardian_address"=> $single->local_guardian_address,
                "emergency_contact_name"=> $single->emergency_contact_name,
                "emergency_contact_relation"=> $single->emergency_contact_relation,
                "emergency_contact_contact"=> $single->emergency_contact_contact,
                "emergency_contact_address"=> $single->emergency_contact_address,
                "previous_institute"=> $single->previous_institute,
                "previous_institute_address"=> $single->previous_institute_address,
                "previous_institute_tc_number"=> $single->previous_institute_tc_number,
                "previous_institute_tc_date"=> $single->previous_institute_tc_date,
                "remark"=> $single->remark,
                "created_at"=> $single->created_at,
                "updated_at"=> $single->updated_at,
            ]);
        });

        // `Tbl_employee` Data
        $data = collect([
            [
            // 'name_en' => '',
            // 'created_at' => now(),
            // 'updated_at' => now(),
            ],
        ]);

        $data->each(function($single){
            Tbl_employee::insert($single);
        });

        // `Tbl_exam_term` Data
        $data = collect([
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

        $data->each(function($single){
            Tbl_exam_term::insert($single);
        });

    }
}
