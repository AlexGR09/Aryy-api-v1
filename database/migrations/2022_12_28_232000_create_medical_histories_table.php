<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('medical_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->unique()->constrained('patients');
            $table->json('height')->nullable();
            $table->json('weight')->nullable();
            $table->double('imc')->nullable();
            $table->string('blood_type')->nullable();
            $table->foreignId('allergy_patient_id')->nullable()->constrained('allergy_patients')->onDelete('cascade');
            $table->foreignId('pathological_background_id')->nullable()->constrained('pathological_backgrounds')->onDelete('cascade');
            $table->foreignId('non_pathological_background_id')->nullable()->constrained('non_pathological_backgrounds')->onDelete('cascade');
            $table->foreignId('hereditary_background_id')->nullable()->constrained('hereditary_backgrounds')->onDelete('cascade');
            //$table->foreignId('vaccination_history_id')->nullable()->constrained('vaccination_histories')->onDelete('cascade');
            $table->foreignId('postnatal_background_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('obstetric_gynecological_background_id')->nullable()->constrained('obstetric_gynecological_backgrounds')->onDelete('cascade');
            $table->foreignId('perinatal_background_id')->nullable()->constrained('perinatal_backgrounds')->onDelete('cascade');
            $table->foreignId('pyschological_background_id')->nullable()->constrained('pyschological_backgrounds')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('medical_histories');
    }
};
