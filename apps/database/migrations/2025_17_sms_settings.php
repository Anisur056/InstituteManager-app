<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('sms_settings', function (Blueprint $table) {
            $table->id();

            $table->string('sms_getway_name')->nullable();
            $table->string('sms_url')->nullable();
            $table->string('sms_api_key')->nullable();
            $table->string('sms_senderid')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sms_settings');
    }
};
