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
        Schema::create('obstetric_gynecological_backgrounds', function (Blueprint $table) {
            $table->id();
            $table->date('first_menstruation')->nullable();
            $table->date('last_menstruation')->nullable();
            $table->enum('bleeding', ['Ligero', 'Moderado', 'Fuerte', 'Manchado'])->nullable();
            $table->enum('pain', ['Cólicos', 'Dolor de cabeza', 'Ovulación', 'Senos sensibles'])->nullable();
            $table->enum('intimate_hygiene', ['Tampón', 'Toalla', 'Protector diario', 'Copa menstrual'])->nullable();
            $table->enum('cervical_discharge', ['Clara de huevo', 'Pegajoso', 'Cremoso', 'Atípico'])->nullable();
            $table->enum('sex', ['Sin protección', 'Con protección', 'Coito interrumpido'])->nullable();
            $table->string('pregnancies')->nullable();
            $table->string('cervical_cancer')->nullable();
            $table->string('breast_cancer')->nullable();
            $table->string('sexually_active')->nullable();
            $table->string('family_planning')->nullable();
            $table->string('hormone_replacement_therapy')->nullable();
            $table->date('last_pap_smear')->nullable();
            $table->date('last_mammography')->nullable();
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
        Schema::dropIfExists('obstetric_gynecological_backgrounds');
    }
};
