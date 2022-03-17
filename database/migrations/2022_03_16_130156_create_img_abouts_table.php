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
        Schema::create('img_abouts', function (Blueprint $table) {
            $table->id();
            $table->text('img');
            $table->string('title');
            $table->string('description');
            $table->string('slogatLeft');
            $table->string('descriptionSL');
            $table->string('slogatRight');
            $table->string('descriptionSR');
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
        Schema::dropIfExists('img_abouts');
    }
};
