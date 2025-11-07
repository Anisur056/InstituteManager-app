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
            $table->string('name')->nullable();
            $table->ipAddress('ip')->nullable();
            $table->integer('port')->nullable();
            $table->string('version')->nullable();
            $table->string('osVersion')->nullable();
            $table->string('platform')->nullable();
            $table->string('fmVersion')->nullable();
            $table->string('workCode')->nullable();
            $table->string('ssr')->nullable();
            $table->string('pinWidth')->nullable();
            $table->string('serialNumber')->nullable();
            $table->string('deviceName')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('attendance_devices');
    }
};
