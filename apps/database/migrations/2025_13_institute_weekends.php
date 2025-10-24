<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('institute_weekends', function (Blueprint $table) {
            $table->id();
            $table->string('day_name');
            $table->integer('day_number'); // 0-6 (Sunday-Saturday)
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('institute_weekends');
    }
};
