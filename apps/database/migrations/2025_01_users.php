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
            $table->string('name_en')->nullable(); 
            $table->string('name_bn');//*
            $table->string('user_name')->unique();//*
            $table->string('password');//*
            $table->string('email')->unique();//*
            $table->enum('role',['admin', 'teacher', 'student','accountant', 'librarian', 'security', 'guest'])->default('guest');

            // For Contact
            $table->string('contact_sms');//*
            $table->string('contact_whatsapp')->nullable();
            $table->enum('sms_status',['active','disable'])->default('active');

            // Personal Info
            $table->string('nid')->nullable();
            $table->string('birth_reg')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->enum('gender',['male','female'])->nullable();
            $table->string('blood_group')->nullable();
            $table->string('health_issues')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('nationality')->default('Bangladeshi');
            $table->string('religion')->nullable();
            $table->string('present_address')->nullable();
            $table->string('permanent_address')->nullable();

            // For Attendance
            $table->string('rfid_card')->nullable();
            $table->string('profile_pic')->nullable();
            $table->string('signature')->nullable();
            $table->enum('status',['active','disable','tc','exam-complete','exit'])->default('active');
            $table->string('joined_at')->nullable();
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
