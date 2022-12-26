<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('medical_appointments', function (Blueprint $table) {
            $table->id();
            $table->date('appointment_date');
            $table->time('appointment_time');
            $table->string('appointment_type');
            $table->enum('status', ['assisted', 'not assisted', 'cancelled' , 'scheduled'])->nullable();
            $table->foreignId('patient_id')->constrained('patients');
            $table->foreignId('physician_id')->constrained('physicians');
            $table->foreignId('facility_id')->constrained('facilities');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('medical_appointments');
    }
};
