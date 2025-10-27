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
            $table->id(); // Total 74 Column

            // Users Information- (14 column)
            $table->string('name'); //* Full Name-required
            $table->string('name_bn')->nullable();
            $table->string('nick_name')->nullable();
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
            $table->string('profile_pic')->nullable();

            // Academic Information- (10 column)
            $table->text('joined_at')->nullable();
            $table->text('academic_year')->nullable();
            $table->text('institute_name')->nullable();
            $table->text('branch')->nullable();
            $table->text('class')->nullable();
            $table->text('shift')->nullable();
            $table->text('section')->nullable();
            $table->text('group')->nullable();
            $table->text('roll')->nullable();
            $table->string('rfid_card')->nullable();
            $table->string('registration_id')->nullable(); // Registration ID- Auto Generated- pattern- 20251027063000866845
            $table->enum('status',['active','pending','disable','tc','exam-complete','exit'])->default('active');

            // Contact Information- (5 column)
            $table->string('contact_sms'); //* Contact For SMS- Required
            $table->string('contact_whatsapp')->nullable();
            $table->enum('sms_status',['on','off'])->default('on');
            $table->text('present_address')->nullable();
            $table->text('permanent_address')->nullable();

            // Father Information- (9 column)
            $table->string('father_name_en')->nullable();
            $table->string('father_name_bn')->nullable();
            $table->string('father_contact')->nullable();
            $table->string('father_occupation')->nullable();
            $table->string('father_nid')->nullable();
            $table->string('father_birth_reg')->nullable();
            $table->string('father_income')->nullable();
            $table->string('father_address')->nullable();
            $table->string('father_profile_pic')->nullable();

            // Mother Information- (9 column)
            $table->string('mother_name_en')->nullable();
            $table->string('mother_name_bn')->nullable();
            $table->string('mother_contact')->nullable();
            $table->string('mother_occupation')->nullable();
            $table->string('mother_nid')->nullable();
            $table->string('mother_birth_reg')->nullable();
            $table->string('mother_income')->nullable();
            $table->string('mother_address')->nullable();
            $table->string('mother_profile_pic')->nullable();

            // Local Guardian Information- (10 column)
            $table->string('local_guardian_name_en')->nullable();
            $table->string('local_guardian_name_bn')->nullable();
            $table->string('local_guardian_contact')->nullable();
            $table->string('local_guardian_occupation')->nullable();
            $table->string('local_guardian_nid')->nullable();
            $table->string('local_guardian_birth_reg')->nullable();
            $table->string('local_guardian_income')->nullable();
            $table->string('local_guardian_address')->nullable();
            $table->string('local_guardian_relation')->nullable();
            $table->string('local_guardian_profile_pic')->nullable();

            // Emergency Information- (4 column)
            $table->string('emergency_contact_name')->nullable();
            $table->string('emergency_contact_relation')->nullable();
            $table->string('emergency_contact_contact')->nullable();
            $table->string('emergency_contact_address')->nullable();

            // Previous Institute Information- (3 column)
            $table->string('previous_institute_name')->nullable();
            $table->string('previous_institute_address')->nullable();
            $table->string('previous_institute_info')->nullable();

            // Profile & Signature
            $table->string('signature')->nullable();

            // Login Information
            $table->string('user_name')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->enum('role',['admin', 'teacher', 'student','accountant', 'librarian', 'security', 'guest'])->default('guest');
            
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
