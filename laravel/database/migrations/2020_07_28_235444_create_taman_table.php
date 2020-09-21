<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taman', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('latlng');
            $table->string('alamat');
            $table->string('deskripsi_pendek')->nullable();
            $table->mediumText('deskripsi_panjang');
            $table->string('foto');
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
        Schema::dropIfExists('taman');
    }
}
