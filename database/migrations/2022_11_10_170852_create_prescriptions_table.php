<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vital_sign_id')->nullable()->constrained();
            $table->string('symptom');
            $table->string('diagnosis');
            $table->string('medical_examination')->nullable();
            $table->json('treatment');
            $table->string('laboratory_studies')->nullable();
            $table->string('cabinet_studies')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('prescriptions');
    }
};
