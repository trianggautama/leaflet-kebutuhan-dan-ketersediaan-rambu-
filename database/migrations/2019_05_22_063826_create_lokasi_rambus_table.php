<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLokasiRambusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lokasi_rambus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('kelurahan_id');
            $table->bigInteger('rambu_id');
            $table->string('longitude');
            $table->string('latitude');
            $table->text('alamat');
            $table->integer('status');
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
        Schema::dropIfExists('lokasi_rambus');
    }
}
