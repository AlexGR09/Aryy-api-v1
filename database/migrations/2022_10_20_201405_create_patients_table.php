<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {

    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->unique();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->json('address');
            $table->string('zip_code');
            $table->string('country_code')->nullable();
            $table->string('emergency_number')->nullable();
            $table->json('id_card')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('set null');
            $table->unsignedBigInteger('health_insurance_id')->nullable();
            $table->foreign('health_insurance_id')->references('id')->on('health_insurances')->onDelete('set null');
            $table->unsignedBigInteger('medical_history_id')->nullable();
            $table->foreign('medical_history_id')->references('id')->on('medical_histories')->onDelete('set null');
            $table->unsignedBigInteger('medical_record_id')->nullable();
            $table->foreign('medical_record_id')->references('id')->on('medical_records')->onDelete('set null');
            $table->timestamps();
            $table->softDeletes();
        });
    }


    public function down()
    {
        Schema::dropIfExists('patients');
    }
};
