<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique()->nullable();
            $table->string('password')->nullable();
            $table->string('country_code')->nullable();
            $table->string('phone_number')->unique()->nullable();
            $table->string('user_folder')->unique()->nullable();
            $table->timestamp('phone_number_verified_at')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
            // $table->string('profile_photo')->nullable();
            // $table->json('profile')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
