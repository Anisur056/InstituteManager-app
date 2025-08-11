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

        Schema::create('tbl_shifts', function (Blueprint $table) {
            $table->id();
            $table->string('shift_name_en')->nullable();
            $table->string('shift_name_bn')->nullable();
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
        Schema::dropIfExists('tbl_shifts');
    }
};
