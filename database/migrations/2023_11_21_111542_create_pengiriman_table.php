<?php
// database/migrations/{timestamp}_create_pengirimans_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengirimanTable extends Migration
{
    public function up()
    {
        Schema::create('pengiriman', function (Blueprint $table) {
            $table->id('id_pengiriman');
            $table->string('kode_pengiriman');
            $table->string('kapasitas_gas_masuk');
            $table->string('bukti_gas_masuk');
            $table->string('kapasitas_gas_keluar');
            $table->string('bukti_gas_keluar');
            $table->enum('status_pengiriman',['Dikirim', 'Proses', 'Diterima']);
            $table->string('sisa_gas');
            $table->unsignedBigInteger('id_pesanan')->nullable();
            $table->unsignedBigInteger('id_sopir')->nullable();
            $table->unsignedBigInteger('id_mobil')->nullable();
            $table->timestamps();

            $table->foreign('id_pesanan')->references('id_pesanan')->on('pesanan');
            $table->foreign('id_sopir')->references('id_sopir')->on('sopir');
            $table->foreign('id_mobil')->references('id_mobil')->on('mobil');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pengiriman');
    }
}
