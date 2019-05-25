<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKetersediaanRambusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ketersediaan_rambus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('lokasi_rambu_id');
            $table->integer('apbn')->length(5);
            $table->integer('kondisi')->length(3);
            $table->string('gambar')->default('default.png');
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
        Schema::dropIfExists('ketersediaan_rambus');
    }
}
