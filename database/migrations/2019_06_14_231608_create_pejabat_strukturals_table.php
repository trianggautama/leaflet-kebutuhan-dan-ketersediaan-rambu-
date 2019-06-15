<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePejabatStrukturalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pejabat_strukturals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('nip')->length(40);
            $table->string('nama_pejabat')->length(75);
            $table->string('pangkat')->length(35);
            $table->string('jabatan')->length(45);
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
        Schema::dropIfExists('pejabat_strukturals');
    }
}
