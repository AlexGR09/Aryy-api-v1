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
            $table->string('phone');
            $table->string('extension')->nullable();
            $table->json('schedule')->nullable();
            $table->string('zipcode');
            $table->string('street');
            $table->string('exterior_no');
            $table->string('interior_no')->nullable();
            $table->string('suburb')->nullable();
            $table->string('references')->nullable();
            $table->string('public_target')->nullable();
            $table->string('accesibility')->nullable();
            $table->json('services')->nullable();
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
