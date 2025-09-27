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
        Schema::create('user_attendance_logs', function (Blueprint $table) {
            $table->id();
            $table->string('uid'); // unique ID of Device Log.
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('state'); // the authentication type, 1 for Fingerprint, 4 for RF Card etc
            $table->string('timestamp'); // time of attendance
            $table->string('type'); // attendance type, like check-in, check-out, overtime-in, overtime-out, break-in & break-out etc. if attendance type is none of them, it gives  255
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_attendance_logs');
    }
};
