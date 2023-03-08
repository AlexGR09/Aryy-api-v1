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
        Schema::create('non_pathological_backgrounds', function (Blueprint $table) {
            $table->id();
            $table->json('physical_activity')->nullable();
            $table->json('rest_time')->nullable();
            $table->json('smoking')->nullable();
            $table->json('alcoholim')->nullable();
            $table->string('other_substances')->nullable();
            $table->enum('diet', ['Dieta mediterránea', 'Dieta de la zona', 'Dieta vegetariana', 'Dieta vegana', 'Dieta de la fertilidad', 'Dieta hipocalórica', 'Dieta hipercalórica', 'Dieta volumétrica', 'Dieta keto', 'Dieta detox', 'Dieta Ornish / Ovolactovegetariana', 'Dieta Dash', 'Dieta paleo'])->nullable();
            $table->json('previous_medication')->nullable();
            $table->json('drug_active')->nullable();
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
        Schema::dropIfExists('non_pathological_backgrounds');
    }
};
