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
        Schema::create('prayers', function (Blueprint $table) {
            $table->id();
            $table->string('fajr')->nullable();
            $table->string('dzuhur')->nullable();
            $table->string('ashar')->nullable();
            $table->string('maghrib')->nullable();
            $table->string('isya')->nullable();
            $table->string('jummah')->nullable();
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
        Schema::dropIfExists('prayers');
    }
};
