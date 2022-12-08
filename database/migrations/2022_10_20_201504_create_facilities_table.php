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
            $table->string('phone');
            $table->string('extension')->nullable();
            $table->string('zipcode');
            $table->json('schedule');
            $table->string('type_schedule');
            $table->float('consultation_length');
            $table->json('accessibility_and_others');
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
