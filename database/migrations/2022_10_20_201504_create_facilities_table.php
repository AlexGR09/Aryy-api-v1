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
            $table->foreignId('user_id')->constrained();
            $table->string('name')->index();
            $table->string('phone');
            $table->string('extension')->nullable();
            $table->string('attetion_time');
            $table->string('zipcode');
            $table->string('town');
            $table->string('street');
            $table->string('exterior_no');
            $table->string('interior_no')->nullable();
            $table->string('references');
            $table->string('accesibility');
            $table->string('public_target');
            $table->string('services');
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
