<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diseases_physicians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('disease_id')->onDelete('cascade')->constrained('diseases');
            $table->foreignId('physician_id')->onDelete('physicians')->constrained('diseases');
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
        Schema::dropIfExists('disease_physician');
    }
};
