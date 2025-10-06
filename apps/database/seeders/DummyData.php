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
        $json = File::get('database/json/StudentModel.json');
        $data = collect(json_decode($json, true));

        $data->each(function($single){
            User::insert($single);
        });

        $records = collect([
            [
                'name' => 'Rofiqual Islam',
                'name_bn' => 'রফিকুল ইসলাম',
                'password' => Hash::make('123'),
                'email' => 'sirikotiamadrasha@gmail.com',
                'role' => 'admin',
                'contact_sms' => '01892178778',
                'contact_whatsapp' => '01892178778',
                'sms_status' => 'on',
                'nid' => '',
                'birth_reg' => '',
                'date_of_birth' => '',
                'gender' => 'male',
                'blood_group' => '',
                'health_issues' => '',
                'height' => '',
                'weight' => '',
                'marital_status' => 'married',
                'nationality' => '',
                'religion' => '',
                'present_address' => '',
                'permanent_address' => '',
                'rfid_card' => '2577534',
                'profile_pic' => 'img/users/rofiq.png',
                'signature' => '',
                'status' => 'active',
                'joined_at' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Anisur Rahman',
                'name_bn' => 'আনিসুর রহমান',
                'password' => Hash::make('123'),
                'email' => 'anis14109@gmail.com',
                'role' => 'admin',
                'contact_sms' => '01871123427',
                'contact_whatsapp' => '01871123427',
                'sms_status' => 'on',
                'nid' => '4202555860',
                'birth_reg' => '',
                'date_of_birth' => '1997-12-01',
                'gender' => 'male',
                'blood_group' => 'A+',
                'health_issues' => '',
                'height' => '',
                'weight' => '',
                'marital_status' => 'married',
                'nationality' => '',
                'religion' => '',
                'present_address' => '',
                'permanent_address' => '',
                'rfid_card' => '2577217',
                'profile_pic' => 'img/users/anis.png',
                'signature' => '',
                'status' => 'active',
                'joined_at' => '2025-01-01',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Nurun Nabi',
                'name_bn' => 'নুরুন নবী',
                'password' => Hash::make('123'),
                'email' => 'nurnabi@gmail.com',
                'role' => 'admin',
                'contact_sms' => '01621986417',
                'contact_whatsapp' => '01621986417',
                'sms_status' => 'on',
                'nid' => '',
                'birth_reg' => '',
                'date_of_birth' => '',
                'gender' => 'male',
                'blood_group' => '',
                'health_issues' => '',
                'height' => '',
                'weight' => '',
                'marital_status' => 'single',
                'nationality' => '',
                'religion' => '',
                'present_address' => '',
                'permanent_address' => '',
                'rfid_card' => '2569950',
                'profile_pic' => 'img/users/nurnabi.png',
                'signature' => '',
                'status' => 'active',
                'joined_at' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sadrul Ula',
                'name_bn' => 'ছদরুল উলা',
                'password' => Hash::make('123'),
                'email' => 'sadrulula@gmail.com',
                'role' => 'teacher',
                'contact_sms' => '01735646953',
                'contact_whatsapp' => '01735646953',
                'sms_status' => 'on',
                'nid' => '',
                'birth_reg' => '',
                'date_of_birth' => '',
                'gender' => 'male',
                'blood_group' => '',
                'health_issues' => '',
                'height' => '',
                'weight' => '',
                'marital_status' => 'married',
                'nationality' => '',
                'religion' => '',
                'present_address' => '',
                'permanent_address' => '',
                'rfid_card' => '',
                'profile_pic' => 'img/users/sadrulula.png',
                'signature' => '',
                'status' => 'active',
                'joined_at' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Habibur Rahman',
                'name_bn' => 'হাবিবুর রহমান',
                'password' => Hash::make('123'),
                'email' => 'habiburrahman@gmail.com',
                'role' => 'teacher',
                'contact_sms' => '01581738726',
                'contact_whatsapp' => '01581738726',
                'sms_status' => 'on',
                'nid' => '',
                'birth_reg' => '',
                'date_of_birth' => '',
                'gender' => 'male',
                'blood_group' => '',
                'health_issues' => '',
                'height' => '',
                'weight' => '',
                'marital_status' => 'married',
                'nationality' => '',
                'religion' => '',
                'present_address' => '',
                'permanent_address' => '',
                'rfid_card' => '',
                'profile_pic' => 'img/users/habibullah.png',
                'signature' => '',
                'status' => 'active',
                'joined_at' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Farzana Akter',
                'name_bn' => 'ফারজানা আক্তার',
                'password' => Hash::make('123'),
                'email' => 'farzana@gmail.com',
                'role' => 'teacher',
                'contact_sms' => '00000000000',
                'contact_whatsapp' => '00000000000',
                'sms_status' => 'on',
                'nid' => '',
                'birth_reg' => '',
                'date_of_birth' => '',
                'gender' => 'male',
                'blood_group' => '',
                'health_issues' => '',
                'height' => '',
                'weight' => '',
                'marital_status' => 'married',
                'nationality' => '',
                'religion' => '',
                'present_address' => '',
                'permanent_address' => '',
                'rfid_card' => '',
                'profile_pic' => 'img/users/farzana.png',
                'signature' => '',
                'status' => 'active',
                'joined_at' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Nasrin Akther',
                'name_bn' => 'নাসরিন আক্তার',
                'password' => Hash::make('123'),
                'email' => 'nasrin@gmail.com',
                'role' => 'teacher',
                'contact_sms' => '01610949736',
                'contact_whatsapp' => '01610949736',
                'sms_status' => 'on',
                'nid' => '',
                'birth_reg' => '',
                'date_of_birth' => '',
                'gender' => 'male',
                'blood_group' => '',
                'health_issues' => '',
                'height' => '',
                'weight' => '',
                'marital_status' => 'married',
                'nationality' => '',
                'religion' => '',
                'present_address' => '',
                'permanent_address' => '',
                'rfid_card' => '',
                'profile_pic' => 'img/users/nasrin.png',
                'signature' => '',
                'status' => 'active',
                'joined_at' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Rasheda Akther',
                'name_bn' => 'রাশেদা আক্তার',
                'password' => Hash::make('123'),
                'email' => 'rasheda@gmail.com',
                'role' => 'teacher',
                'contact_sms' => '01864755915',
                'contact_whatsapp' => '01864755915',
                'sms_status' => 'on',
                'nid' => '',
                'birth_reg' => '',
                'date_of_birth' => '',
                'gender' => 'male',
                'blood_group' => '',
                'health_issues' => '',
                'height' => '',
                'weight' => '',
                'marital_status' => 'married',
                'nationality' => '',
                'religion' => '',
                'present_address' => '',
                'permanent_address' => '',
                'rfid_card' => '',
                'profile_pic' => 'img/users/rasheda.png',
                'signature' => '',
                'status' => 'active',
                'joined_at' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sufia Akther Simi',
                'name_bn' => 'সুফিয়া আক্তার সিমি',
                'password' => Hash::make('123'),
                'email' => 'sufia@gmail.com',
                'role' => 'teacher',
                'contact_sms' => '01835905440',
                'contact_whatsapp' => '01835905440',
                'sms_status' => 'on',
                'nid' => '',
                'birth_reg' => '',
                'date_of_birth' => '',
                'gender' => 'male',
                'blood_group' => '',
                'health_issues' => '',
                'height' => '',
                'weight' => '',
                'marital_status' => 'married',
                'nationality' => '',
                'religion' => '',
                'present_address' => '',
                'permanent_address' => '',
                'rfid_card' => '',
                'profile_pic' => 'img/users/sufia.png',
                'signature' => '',
                'status' => 'active',
                'joined_at' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Abdur Rahim',
                'name_bn' => 'আব্দুর রহিম',
                'password' => Hash::make('123'),
                'email' => 'abdur@gmail.com',
                'role' => 'security',
                'contact_sms' => '01854351399',
                'contact_whatsapp' => '',
                'sms_status' => 'on',
                'nid' => '',
                'birth_reg' => '',
                'date_of_birth' => '',
                'gender' => 'male',
                'blood_group' => '',
                'health_issues' => '',
                'height' => '',
                'weight' => '',
                'marital_status' => 'married',
                'nationality' => '',
                'religion' => '',
                'present_address' => '',
                'permanent_address' => '',
                'rfid_card' => '2575433',
                'profile_pic' => 'img/users/000.png',
                'signature' => '',
                'status' => 'active',
                'joined_at' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

         $records->each(function($data){
                User::insert($data);
            });


        // `tbl_institutes` Data
        $records = collect([
            [
            'name_en' => 'Sirikotia Hafezia Nurani Model Madrasha',
            'name_bn' => 'ছিরিকোটিয়া হাফেজিয়া নূরানী মডেল মাদ্রাসা',
            'address_en' => 'Hazi Dorbesh Ali Chowdhury Bari, Biswash para, Uttor Kattoli, Akborsha, Chattogram',
            'address_bn' => 'হাজী দরবেশ আলী চৌধুরী বাড়ী, বিশ্বাস পাড়া, উত্তর কাট্টলী, আকবরশাহ, চট্টগ্রাম',
            'eiin_number' => null,
            'mobile' => '01892178778',
            'email' => 'sirikotiamadrasha@gmail.com',
            'website' => 'www.sirikotiamadrasha.com',
            'logo' => 'assets/admin/img/institutes/logo-1.png',
            'office_pad' => 'assets/admin/img/institutes/office-pad-1.jpg',
            'id_card_front_employee' => 'assets/admin/img/institutes/id-card-front-employee-1.png',
            'id_card_front_student' => 'assets/admin/img/institutes/id-card-front-student-1.png',
            'id_card_back' => 'assets/admin/img/institutes/id-card-back-1.png',
            'exam_admit_card' => 'assets/admin/img/institutes/exam-admit-card-1.png',
            'exam_seat_sticker' => 'assets/admin/img/institutes/exam-seat-sticker-1.png',
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
            'logo' => 'assets/admin/img/institutes/logo-2.png',
            'office_pad' => 'assets/admin/img/institutes/office-pad-2.jpg',
            'id_card_front_employee' => 'id-card-front-employee-2.png',
            'id_card_front_student' => 'assets/admin/img/institutes/id-card-front-student-2.png',
            'id_card_back' => 'assets/admin/img/institutes/id-card-back-2.png',
            'exam_admit_card' => 'assets/admin/img/institutes/exam-admit-card-2.png',
            'exam_seat_sticker' => 'assets/admin/img/institutes/exam-seat-sticker-2.png',
            'google_map' => '',
            'display_order' => 2,
            'created_at' => now(),
            'updated_at' => now(),
            ]
        ]);


            $records->each(function($data){
                InstituteInfoModel::insert($data);
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
            'name_en' => 'Hifz-Nazera',
            'name_bn' => 'হিফজ নাজেরা',
            'display_order' => 7,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name_en' => 'Hifz-International',
            'name_bn' => 'হিফজ আন্তর্জাতিক',
            'display_order' => 8,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name_en' => 'Hifz-Rivision',
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
            [
            'year_en' => '2025',
            'year_bn' => '২০২৫',
            'display_order' => 2,
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
