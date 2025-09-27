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
        Schema::create('institute_info', function (Blueprint $table) {
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
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institute_info');
    }
};
