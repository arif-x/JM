<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeranjangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keranjang', function (Blueprint $table) {
            $table->increments('id_keranjang');
            $table->string('id_user');
            $table->string('id_paket');
            $table->string('id_kategori');
            $table->string('id_jenis_kampus');
            $table->string('tgl_pesan');
            $table->string('tgl_limit_bayar');
            $table->string('bukti_pembayaran');
            $table->string('status_pembayaran');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keranjang');
    }
}
