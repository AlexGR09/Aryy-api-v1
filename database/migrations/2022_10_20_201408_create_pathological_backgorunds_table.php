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
        Schema::create('pathological_backgorunds', function (Blueprint $table) {
            $table->id();
            $table->string('previous_surgeries')->nullable();
            $table->string('blood_transfusions')->nullable();
            $table->string('diabetes')->nullable();
            $table->string('heart_diseases')->nullable();
            $table->string('blood_pressure')->nullable();
            $table->string('thyroid_diseases')->nullable();
            $table->string('cancer')->nullable();
            $table->string('kidney_stones')->nullable();
            $table->string('hepatitis')->nullable();
            $table->string('trauma')->nullable();
            $table->string('respiratory_diseases')->nullable();
            $table->string('ets')->nullable();
            $table->string('gastrointestinal_pathologies')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pathological_backgorunds');
    }
};
