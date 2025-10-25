<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UsersSeeder;
use Database\Seeders\UserFileUploadsSeeder;
use Database\Seeders\UserAttendanceLogsSeeder;
use Database\Seeders\InstituteInfoSeeder;
use Database\Seeders\InstituteAcademicYearsSeeder;
use Database\Seeders\InstituteClassesSeeder;
use Database\Seeders\InstituteShiftsSeeder;
use Database\Seeders\InstituteSectionsSeeder;
use Database\Seeders\InstituteSubjectSeeder;
use Database\Seeders\InstituteExamTermsSeeder;
use Database\Seeders\InstituteGroupsSeeder;
use Database\Seeders\InstituteWeekendsSeeder;
use Database\Seeders\InstituteHolidaysSeeder;
use Database\Seeders\InstituteLeavesSeeder;
use Database\Seeders\AttendanceDevicesSeeder;
use Database\Seeders\SmsSettingsSeeder;
use Database\Seeders\SmsLogsSeeder;
use Database\Seeders\WebsiteGallerySeeder;
use Database\Seeders\WebsiteNoticeSeeder;
use Database\Seeders\WebsiteVideoGallerySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UsersSeeder::class,
            UserFileUploadsSeeder::class,
            UserAttendanceLogsSeeder::class,
            InstituteInfoSeeder::class,
            InstituteBranchesSeeder::class,
            InstituteAcademicYearsSeeder::class,
            InstituteClassesSeeder::class,
            InstituteShiftsSeeder::class,
            InstituteSectionsSeeder::class,
            InstituteSubjectSeeder::class,
            InstituteExamTermsSeeder::class,
            InstituteGroupsSeeder::class,
            InstituteWeekendsSeeder::class,
            InstituteHolidaysSeeder::class,
            InstituteLeavesSeeder::class,
            AttendanceDevicesSeeder::class,
            SmsSettingsSeeder::class,
            SmsLogsSeeder::class,
            WebsiteGallerySeeder::class,
            WebsiteNoticeSeeder::class,
            WebsiteVideoGallerySeeder::class,
        ]);
    }
}
