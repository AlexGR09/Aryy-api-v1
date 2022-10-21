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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('last_name');
            $table->enum('sex',array('Masculino','Femenino','Transgenero','Transexual','Intersexual'));
            $table->enum('gender',array('Masculino','Femenino'));
            $table->date('birthday');            
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->default('');
            $table->strng('code_country');
            $table->string('phone_number')->nullable();
            $table->string('emergency_number')->nullable();
            $table->string('address')->nullable();
            $table->string('zide_code')->nullable();
            $table->string('id_card')->nullable();
            $table->unsignedBigInteger('cities_id');
            $table->foreign('cities_id')->references('id')->on('cities')->onDelete('cascade');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
