<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaporanMasyarakatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan_masyarakats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama')->length(75);
            $table->bigInteger('no_hp')->length(17);
            $table->text('keterangan');
            $table->text('gambar');
            $table->string('longitude');
            $table->string('latitude');
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('laporan_masyarakats');
    }
}
