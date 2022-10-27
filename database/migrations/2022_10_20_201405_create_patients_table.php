<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('emergency_number')->nullable();
            $table->string('address')->nullable();
            $table->string('zip_code')->nullable();
            $table->enum('id_card',array('INE','Pasaporte'))->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->unsignedBigInteger('health_insurance_id')->nullable();
            $table->foreign('health_insurance_id')->references('id')->on('health_insurances')->onDelete('cascade');
            $table->unsignedBigInteger('medical_history_id')->nullable();
            $table->foreign('medical_history_id')->references('id')->on('medical_histories')->onDelete('cascade');
            $table->unsignedBigInteger('medical_record_id')->nullable();
            $table->foreign('medical_record_id')->references('id')->on('medical_records')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();

            //health_insurance_id medical_history_id medical_records_id

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
};
