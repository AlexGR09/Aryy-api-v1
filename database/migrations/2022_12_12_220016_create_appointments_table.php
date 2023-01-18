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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id_physician')->nullable()->constrained();
            $table->foreignId('user_id_patient')->nullable()->constrained();
            $table->foreignId('specialty_id')->constrained();
            $table->dateTime('appointment_date');
            $table->string('address')->nullable();
            $table->enum('status', ['attended', 'no-attended', 'canceled', 'scheduled']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
};
