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
        Schema::create('user_info', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Academic info
            $table->string('academic_year')->nullable();
            $table->string('institute_name')->nullable();
            $table->string('shift')->nullable();
            $table->string('class')->nullable();
            $table->string('section')->nullable();
            $table->string('group')->nullable();
            $table->string('roll')->nullable();
            $table->string('designation')->nullable();
            
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

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_info');
    }
};
