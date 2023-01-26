<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('city_id')->nullable()->constrained('cities');
            $table->boolean('main_profile')->default(false);
            $table->string('full_name')->nullable();
            $table->enum('gender', ['Masculino', 'Femenino'])->nullable();
            $table->date('birthday')->nullable();
            $table->json('address')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('country_code')->nullable();
            $table->string('emergency_number')->nullable();
            $table->json('id_card')->nullable();
            $table->string('patient_folder')->nullable();
            $table->string('patient_profile_photo')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('patients');
    }
};
