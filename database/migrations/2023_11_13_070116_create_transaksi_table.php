<?php
// database/migrations/{timestamp}_create_transaksis_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id('id_transaksi');
            $table->string('resi_transaksi');
            $table->dateTime('tanggal_transaksi');
            $table->integer('jumlah_transaksi');
            $table->decimal('total_transaksi', 50, 0);
            $table->string('jadwal_bayar');
            $table->unsignedBigInteger('id_pelanggan');
            $table->unsignedBigInteger('id_tagihan');
            $table->unsignedBigInteger('id_pengiriman')->nullable();
            $table->unsignedBigInteger('id_admin');
            $table->timestamps();

            $table->foreign('id_pelanggan')->references('id_pelanggan')->on('pelanggan');
            $table->foreign('id_tagihan')->references('id_tagihan')->on('tagihan');
            $table->foreign('id_pengiriman')->references('id_pengiriman')->on('pengiriman');
            $table->foreign('id_admin')->references('id_admin')->on('admin');
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
