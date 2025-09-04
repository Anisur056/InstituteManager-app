<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('user_name')->unique();
            $table->string('full_name')->nullable();
            $table->string('phone_number')->unique();
            $table->string('email')->unique();
            $table->string('role')->default('guest');
            $table->string('password');
            $table->string('profile_pic')->nullable();
            $table->timestamps();
        });

        Schema::create('tbl_students', function (Blueprint $table) {
            $table->id();
            $table->string('status')->default('active');
            $table->string('enrolled_date')->nullable();
            $table->string('profile_pic')->nullable();

            $table->string('academic_year')->nullable();
            $table->string('institute_name')->nullable();
            $table->string('shift')->nullable();
            $table->string('class')->nullable();
            $table->string('section')->nullable();
            $table->string('group')->nullable();
            $table->string('roll')->nullable();
            $table->string('name_bn')->nullable();
            $table->string('name_en')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('birth_reg')->nullable();
            $table->string('nid')->nullable();
            $table->string('gender')->nullable();
            $table->string('religion')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('health_issues')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('nationality')->default('Bangladeshi');

            $table->string('contact_sms')->nullable();
            $table->string('sms_status')->nullable();
            $table->string('contact_whatsapp')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('present_address')->nullable();
            $table->string('permanent_address')->nullable();

            $table->string('father_name_en')->nullable();
            $table->string('father_name_bn')->nullable();
            $table->string('father_contact')->nullable();
            $table->string('father_occupation')->nullable();
            $table->string('father_birth_reg')->nullable();
            $table->string('father_nid')->nullable();
            $table->string('father_income')->nullable();

            $table->string('mother_name_en')->nullable();
            $table->string('mother_name_bn')->nullable();
            $table->string('mother_contact')->nullable();
            $table->string('mother_occupation')->nullable();
            $table->string('mother_birth_reg')->nullable();
            $table->string('mother_nid')->nullable();
            $table->string('mother_income')->nullable();

            $table->string('local_guardian_name_en')->nullable();
            $table->string('local_guardian_name_bn')->nullable();
            $table->string('local_guardian_relation')->nullable();
            $table->string('local_guardian_contact')->nullable();
            $table->string('local_guardian_nid')->nullable();
            $table->string('local_guardian_address')->nullable();

            $table->string('emergency_contact_name')->nullable();
            $table->string('emergency_contact_relation')->nullable();
            $table->string('emergency_contact_contact')->nullable();
            $table->string('emergency_contact_address')->nullable();

            $table->string('previous_institute')->nullable();
            $table->string('previous_institute_address')->nullable();
            $table->string('previous_institute_tc_number')->nullable();
            $table->string('previous_institute_tc_date')->nullable();

            $table->text('remark')->nullable();

            $table->timestamps();
        });

        Schema::create('tbl_employees', function (Blueprint $table) {
            $table->id();
            $table->string('status')->nullable();
            $table->string('enrolled_date')->nullable();
            $table->string('profile_pic')->nullable();
            $table->string('signature')->nullable();

            $table->string('institute_name')->nullable();
            $table->string('shift')->nullable();
            $table->string('designation')->nullable();
            $table->string('name_en')->nullable();
            $table->string('name_bn')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('birth_reg')->nullable();
            $table->string('nid')->nullable();
            $table->string('gender')->nullable();
            $table->string('religion')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('health_issues')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('nationality')->default('Bangladeshi');

            $table->string('contact_sms')->nullable();
            $table->string('contact_whatsapp')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('present_address')->nullable();
            $table->string('permanent_address')->nullable();

            $table->string('father_name_en')->nullable();
            $table->string('father_name_bn')->nullable();
            $table->string('father_contact')->nullable();
            $table->string('father_occupation')->nullable();
            $table->string('father_birth_reg')->nullable();
            $table->string('father_nid')->nullable();
            $table->string('father_income')->nullable();

            $table->string('mother_name_en')->nullable();
            $table->string('mother_name_bn')->nullable();
            $table->string('mother_contact')->nullable();
            $table->string('mother_occupation')->nullable();
            $table->string('mother_birth_reg')->nullable();
            $table->string('mother_nid')->nullable();
            $table->string('mother_income')->nullable();

            $table->string('emergency_contact_name')->nullable();
            $table->string('emergency_contact_relation')->nullable();
            $table->string('emergency_contact_contact')->nullable();
            $table->string('emergency_contact_address')->nullable();

            $table->string('previous_institute')->nullable();
            $table->string('previous_institute_address')->nullable();
            $table->string('previous_institute_experiance')->nullable();

            $table->timestamps();
        });

        Schema::create('tbl_attendance_logs', function (Blueprint $table) {
            $table->id();
            $table->string('uid'); // unique ID of Device Log.
            $table->string('user_id'); // user ID of Device.
            $table->string('state'); // the authentication type, 1 for Fingerprint, 4 for RF Card etc
            $table->string('timestamp'); // time of attendance
            $table->string('type'); // attendance type, like check-in, check-out, overtime-in, overtime-out, break-in & break-out etc. if attendance type is none of them, it gives  255
            $table->timestamps();
        });

        Schema::create('tbl_institutes', function (Blueprint $table) {
            // 16 table coloumn
            $table->id();
            $table->string('name_en');
            $table->string('name_bn');
            $table->string('address_en');
            $table->string('address_bn');
            $table->string('eiin_number')->nullable();
            $table->string('mobile');
            $table->string('email');
            $table->string('website');
            $table->string('logo');
            $table->string('office_pad');
            $table->string('id_card_front_employee');
            $table->string('id_card_front_student');
            $table->string('id_card_back');
            $table->string('exam_admit_card');
            $table->string('exam_seat_sticker');
            $table->string('google_map');
            $table->integer('display_order');
            $table->timestamps();
        });

        Schema::create('tbl_academic_years', function (Blueprint $table) {
            $table->id();
            $table->string('year_en')->nullable();
            $table->string('year_bn')->nullable();
            $table->integer('display_order')->nullable();
            $table->timestamps();
        });

        Schema::create('tbl_classes', function (Blueprint $table) {
            $table->id();
            $table->string('name_en')->nullable();
            $table->string('name_bn')->nullable();
            $table->integer('display_order')->nullable();
            $table->timestamps();
        });

        Schema::create('tbl_shifts', function (Blueprint $table) {
            $table->id();
            $table->string('name_en')->nullable();
            $table->string('name_bn')->nullable();
            $table->integer('display_order')->nullable();
            $table->timestamps();
        });

        Schema::create('tbl_sections', function (Blueprint $table) {
            $table->id();
            $table->string('name_en')->nullable();
            $table->string('name_bn')->nullable();
            $table->integer('display_order')->nullable();
            $table->timestamps();
        });

        Schema::create('tbl_exam_terms', function (Blueprint $table) {
            $table->id();
            $table->string('name_en')->nullable();
            $table->string('name_bn')->nullable();
            $table->integer('display_order')->nullable();
            $table->timestamps();
        });

        Schema::create('tbl_groups', function (Blueprint $table) {
            $table->id();
            $table->string('name_en')->nullable();
            $table->string('name_bn')->nullable();
            $table->integer('display_order')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('tbl_institutes');
        Schema::dropIfExists('tbl_academic_years');
        Schema::dropIfExists('tbl_classes');
        Schema::dropIfExists('tbl_shifts');
        Schema::dropIfExists('tbl_sections');
        Schema::dropIfExists('tbl_exam_terms');
        Schema::dropIfExists('tbl_groups');
        Schema::dropIfExists('tbl_students');
        Schema::dropIfExists('tbl_employees');
        Schema::dropIfExists('tbl_attendance_logs');
    }
};
