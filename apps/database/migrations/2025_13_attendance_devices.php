<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('attendance_devices', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->ipAddress('ip');
            $table->integer('port');
            $table->string('serialNumber')->unique();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('attendance_devices');
    }
};
