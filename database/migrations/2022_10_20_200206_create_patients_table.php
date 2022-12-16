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
            $table->foreignId('city_id')->constrained('cities');
            $table->boolean('main_profile')->default(FALSE);
            $table->string('full_name')->nullable();
            $table->enum('gender', ['masculino', 'femenino'])->nullable();
            $table->date('birthday')->nullable();
            $table->json('address')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('country_code')->nullable();
            $table->string('emergency_number')->nullable();             
            $table->json('id_card')->nullable();
            $table->string('patient_folder')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('patients');
    }
};
