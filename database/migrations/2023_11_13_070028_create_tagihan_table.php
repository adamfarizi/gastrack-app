<?php
// database/migrations/{timestamp}_create_tagihans_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagihanTable extends Migration
{
    public function up()
    {
        Schema::create('tagihan', function (Blueprint $table) {
            $table->id('id_tagihan');
            $table->dateTime('tanggal_jatuh_tempo');
            $table->decimal('jumlah_tagihan', 50, 0);
            $table->enum('status_tagihan',['Sudah Bayar','Belum Bayar'])->default('Belum Bayar');
            $table->dateTime('tanggal_pembayaran')->nullable();
            $table->string('bukti_pembayaran')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tagihan');
    }
}
