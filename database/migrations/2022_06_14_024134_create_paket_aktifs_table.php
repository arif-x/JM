<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaketAktifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paket_aktif', function (Blueprint $table) {
            $table->increments('id_paket_aktif');
            $table->string('id_user');
            $table->string('id_paket');
            $table->string('id_kategori');
            $table->string('id_jenis_kampus');
            $table->string('tgl_aktif');
            $table->string('tgl_limit');
            $table->string('status_paket_aktif');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paket_aktif');
    }
}
