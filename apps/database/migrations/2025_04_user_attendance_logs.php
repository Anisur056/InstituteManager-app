<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_attendance_logs', function (Blueprint $table) {
            $table->id();
            $table->string('uid'); // unique ID of Device Log.
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('state'); // the authentication type, 1 for Fingerprint, 4 for RF Card etc
            $table->timestamp('timestamp'); // time of attendance
            $table->string('type'); // attendance type, like check-in, check-out, overtime-in, overtime-out, break-in & break-out etc. if attendance type is none of them, it gives  255
            $table->timestamps();
        });
    }

    // public function up()
    // {
    //     Schema::create('attendance_logs', function (Blueprint $table) {
    //         $table->id();
    //         $table->foreignId('user_id')->constrained();
    //         $table->date('date');
    //         $table->time('check_in')->nullable();
    //         $table->time('check_out')->nullable();
    //         $table->enum('status', ['present', 'absent', 'late', 'leave'])->default('absent');
    //         $table->text('notes')->nullable();
    //         $table->timestamps();

    //         $table->unique(['user_id', 'date']);
    //     });
    // }

    public function down(): void
    {
        Schema::dropIfExists('user_attendance_logs');
    }
};
