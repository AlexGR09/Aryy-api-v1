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
        Schema::create('obgyn_backgrounds', function (Blueprint $table) {
            $table->id();
            $table->date('first_menstruation')->nullable();
            $table->date('last_menstruation')->nullable();
            $table->string('bleeding')->nullable();
            $table->string('pain')->nullable();
            $table->string('intimate_hygiene')->nullable();
            $table->string('cervical_discharge')->nullable();
            $table->string('sex')->nullable();
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
        Schema::dropIfExists('obgyn_backgrounds');
    }
};
