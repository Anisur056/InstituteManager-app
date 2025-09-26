<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('sms_logs', function (Blueprint $table) {
            $table->id();

            $table->string('send_to')->nullable();
            $table->string('send_sms')->nullable();
            $table->string('timestamps')->nullable();

            $table->integer('response_code')->nullable();
            $table->integer('message_id')->nullable();
            $table->string('success_message')->nullable();
            $table->string('error_message')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sms_logs');
    }
};
