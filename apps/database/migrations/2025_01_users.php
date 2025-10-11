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

            // For Login
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->enum('role',['admin', 'teacher', 'student','accountant', 'librarian', 'security', 'guest'])->default('guest');

            // For Attendance
            $table->string('rfid_card')->nullable();

            // For Contact
            $table->string('contact_sms');//* Contact For SMS
            $table->string('contact_whatsapp')->nullable();
            $table->enum('sms_status',['on','off'])->default('on');
            $table->text('present_address')->nullable();
            $table->text('permanent_address')->nullable();

            // Personal Info
            $table->string('name');//* Full Name
            $table->string('name_bn')->nullable();
            $table->string('nid')->nullable();
            $table->string('birth_reg')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->enum('gender',['male','female'])->nullable();
            $table->string('blood_group')->nullable();
            $table->string('health_issues')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->enum('marital_status', ['single', 'married', 'divorced', 'widowed'])->default('single');
            $table->string('nationality')->default('Bangladeshi');
            $table->string('religion')->nullable();


            // Academic Info
            $table->string('joined_at')->nullable();
            $table->string('class')->nullable();
            $table->string('roll')->nullable();

            // Academic info
            $table->string('academic_year')->nullable();
            $table->string('institute_name')->nullable();
            $table->string('shift')->nullable();
            $table->string('section')->nullable();
            $table->string('group')->nullable();

            // Father Info
            $table->string('father_name_en')->nullable();
            $table->string('father_name_bn')->nullable();
            $table->string('father_contact')->nullable();
            $table->string('father_occupation')->nullable();
            $table->string('father_nid')->nullable();
            $table->string('father_birth_reg')->nullable();
            $table->string('father_income')->nullable();
            $table->string('father_address')->nullable();

            // Mother Info
            $table->string('mother_name_en')->nullable();
            $table->string('mother_name_bn')->nullable();
            $table->string('mother_contact')->nullable();
            $table->string('mother_occupation')->nullable();
            $table->string('mother_nid')->nullable();
            $table->string('mother_birth_reg')->nullable();
            $table->string('mother_income')->nullable();
            $table->string('mother_address')->nullable();

            // Local Guardian Info
            $table->string('local_guardian_name_en')->nullable();
            $table->string('local_guardian_name_bn')->nullable();
            $table->string('local_guardian_contact')->nullable();
            $table->string('local_guardian_occupation')->nullable();
            $table->string('local_guardian_nid')->nullable();
            $table->string('local_guardian_birth_reg')->nullable();
            $table->string('local_guardian_income')->nullable();
            $table->string('local_guardian_address')->nullable();
            $table->string('local_guardian_relation')->nullable();

            // Emergency Info
            $table->string('emergency_contact_name')->nullable();
            $table->string('emergency_contact_relation')->nullable();
            $table->string('emergency_contact_contact')->nullable();
            $table->string('emergency_contact_address')->nullable();

            // Previous Institute Info
            $table->string('previous_institute_name')->nullable();
            $table->string('previous_institute_address')->nullable();
            $table->string('previous_institute_info')->nullable();

            // Profile & Signature
            $table->string('profile_pic')->nullable();
            $table->string('signature')->nullable();

            $table->enum('status',['active','disable','tc','exam-complete','exit'])->default('active');
            $table->rememberToken();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');


    }
};
