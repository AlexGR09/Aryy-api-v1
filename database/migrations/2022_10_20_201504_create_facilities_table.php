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
            $table->string('name')->index();
            $table->json('location')->nullable();
            $table->string('phone')->nullable();
            $table->string('extension')->nullable();
            $table->string('zipcode')->nullable();
            $table->json('schedule')->nullable();
            $table->string('type_schedule')->nullable();
            $table->integer('consultation_length')->nullable();
            $table->json('accessibility_and_others')->nullable();
            $table->json('coordinates')->nullable();
            $table->foreignId('city_id')->constrained()->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('facilities');
    }
};
