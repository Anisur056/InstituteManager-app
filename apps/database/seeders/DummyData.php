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
            'address_en' => 'Hazi Dorbesh Ali Chowdhury Bari, Biswash para, Uttor Kattoli, Akborsha, Chattogram',
            'address_bn' => 'হাজী দরবেশ আলী চৌধুরী বাড়ী, বিশ্বাস পাড়া, উত্তর কাট্টলী, আকবরশাহ, চট্টগ্রাম',
            'eiin_number' => null,
            'mobile' => '01892178778',
            'email' => 'sirikotiamadrasha@gmail.com',
            'website' => 'www.sirikotiamadrasha.com',
            'logo' => 'img/logo-1.png',
            'office_pad' => 'img/office-pad-1.jpg',
            'id_card_front_employee' => 'img/id-card-front-employee-1.png',
            'id_card_front_student' => 'img/id-card-front-student-1.png',
            'id_card_back' => 'img/id-card-back-1.png',
            'exam_admit_card' => 'img/exam-admit-card-1.png',
            'exam_seat_sticker' => 'img/exam-seat-sticker-1.png',
            'google_map' => 'https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d922.4142985164051!2d91.76706526956704!3d22.366569238938805!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjLCsDIxJzU5LjYiTiA5McKwNDYnMDMuOCJF!5e0!3m2!1sen!2sbd!4v1750559986344!5m2!1sen!2sbd',
            'display_order' => 1,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name_en' => 'AMN Islamia Madrasha',
            'name_bn' => 'এএমএন ইসলামিয়া মাদ্রাসা',
            'address_en' => 'Lotifpur, Akborsha, CTG',
            'address_bn' => 'লতিফপুর, আকবরশাহ্, চট্টগ্রাম',
            'eiin_number' => null,
            'mobile' => '01892178778',
            'email' => '',
            'website' => '',
            'logo' => 'img/logo-2.png',
            'office_pad' => 'img/office-pad-2.jpg',
            'id_card_front_employee' => 'img/id-card-front-employee-2.png',
            'id_card_front_student' => 'img/id-card-front-student-2.png',
            'id_card_back' => 'img/id-card-back-2.png',
            'exam_admit_card' => 'img/exam-admit-card-2.png',
            'exam_seat_sticker' => 'img/exam-seat-sticker-2.png',
            'google_map' => '',
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

        $data->each(function($single){
            Tbl_classe::insert($single);
        });

        // Tbl_shift Data
        $data = collect([
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

        // `StudentModel` Data
        $json = File::get('database/json/StudentModel.json');
        $data = collect(json_decode($json));

        $data->each(function($single){
            StudentModel::create([
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

        // `Tbl_group` Data
        $data = collect([
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

        $data->each(function($single){
            Tbl_group::insert($single);
        });

        // Finger Device Info
        $data = collect([
            [
            'name' => 'Zkteco K40',
            'ip' => '192.168.1.105',
            'port' => 4370,
            'serialNumber' => '',
            ]
        ]);

        $data->each(function($single){
            Tbl_finger_Device::insert($single);
        });

    }
}
