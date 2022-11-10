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
        Schema::create('medical_appointments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('appointment_date');
            $table->string('appointment_time');
            $table->unsignedBigInteger('physician_id')->nullable();
            $table->foreign('physician_id')->references('id')->on('physicians')->onDelete('set null');
            $table->unsignedBigInteger('patients_id');
            $table->foreign('patients_id')->references('id')->on('patients')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medical_appointments');
    }
};
