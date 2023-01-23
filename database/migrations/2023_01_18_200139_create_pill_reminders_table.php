<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pill_reminders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('patients');
            $table->string('drug');
            $table->string('doce');
            $table->string('frecuency');
            $table->date('start_treatment');
            $table->date('end_treatment');
            $table->time('first_take');
            $table->string('instruction');
            $table->enum('status', ['finalized', 'pending'])->default('pending');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pill_reminders');
    }
};
