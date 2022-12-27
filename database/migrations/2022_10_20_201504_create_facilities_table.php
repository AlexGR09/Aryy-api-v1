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
            $table->json('location');
            $table->string('phone')->nullable();
            $table->string('extension')->nullable();
            $table->string('zipcode');
            $table->json('schedule')->nullable();
            $table->string('type_schedule')->nullable();
            $table->time('consultation_length')->nullable();
            $table->json('accessibility_and_others')->nullable();
            $table->json('coordinates')->nullable();
            $table->foreignId('city_id')->constrained();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('facilities');
    }
};
