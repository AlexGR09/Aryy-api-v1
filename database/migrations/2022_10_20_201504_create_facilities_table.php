<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('facilities', function (Blueprint $table) {
            $table->id();
            $table->string('facility_name');
            $table->json('location');
            $table->string('phone_number')->nullable();
            $table->string('zip_code');
            $table->json('schedule');
            $table->string('consultation_length')->nullable();
            $table->json('accessibility')->nullable();
            $table->string('clues')->nullable();
            $table->foreignId('city_id')->constrained('cities');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('facilities');
    }
};
