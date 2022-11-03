<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {

    public function up()
    {
        Schema::create('physicians', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->unique();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('professional_name');
            $table->json('certificates')->nullable();
            $table->json('social_networks')->nullable();
            $table->string('biography')->nullable();
            $table->string('recipe_template')->nullable();
            $table->enum('is_verified', ['not_verified', 'in_verification', 'verified'])->default('not_verified');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('physicians');
    }
};
