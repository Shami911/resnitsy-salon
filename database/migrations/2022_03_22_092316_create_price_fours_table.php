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
        Schema::create('price_fours', function (Blueprint $table) {
            $table->id();
            $table->string('slogan');
            $table->string('title');
            $table->string('cost');
            $table->string('time');
            $table->string('service1');
            $table->string('service2');
            $table->string('service3');
            $table->string('service4');
            $table->string('service5');
            $table->string('button');
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
        Schema::dropIfExists('price_fours');
    }
};
