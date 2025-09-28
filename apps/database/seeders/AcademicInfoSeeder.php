<?php

namespace Database\Seeders;

use App\Models\InstituteInfoModel;
use Illuminate\Database\Seeder;

class AcademicInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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

        $records->each(function($data){
            InstituteInfoModel::insert($data);
        });

    }
}
