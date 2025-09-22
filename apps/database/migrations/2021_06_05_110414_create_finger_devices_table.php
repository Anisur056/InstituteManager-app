<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFingerDevicesTable extends Migration
{
    public function up()
    {
        Schema::create('tbl_finger_devices', function (Blueprint $table) {
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
        Schema::dropIfExists('tbl_finger_devices');
    }
}
