<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {

    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->json('address');
            $table->string('zip_code');
            $table->string('country_code')->nullable();
            $table->string('emergency_number')->nullable();
            $table->json('id_card')->nullable();
            $table->foreignId('city_id')->references('id')->on('cities');
            /* $table->foreignId('health_insurance_id')->nullable()->constrained('health_insurances');
            $table->foreignId('medical_history_id')->nullable()->constrained('medical_histories'); 
            $table->foreignId('medical_record_id')->nullable()->constrained('medical_records'); */
            $table->timestamps();
            $table->softDeletes();
        });
    }


    public function down()
    {
        Schema::dropIfExists('patients');
    }
};
