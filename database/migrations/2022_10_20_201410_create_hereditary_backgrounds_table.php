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
        Schema::create('hereditary_backgrounds', function (Blueprint $table) {
            $table->id();
            $table->json('diabetes')->nullable();
            $table->json('heart_diseases')->nullable();
            $table->json('blood_pressure')->nullable();
            $table->json('thyroid_diseases')->nullable();
            $table->json('cancer')->nullable();
            $table->json('kidney_stones')->nullable();
            $table->json('blood_diseases')->nullable();
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
        Schema::dropIfExists('hereditary_backgrounds');
    }
};
