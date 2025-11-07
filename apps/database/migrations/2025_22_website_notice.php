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
        Schema::create('website_notices', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('date')->nullable();
            $table->string('image')->nullable();
            $table->enum('enable_status',['on','off'])->default('on');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('website_notices'); 
    }
};
