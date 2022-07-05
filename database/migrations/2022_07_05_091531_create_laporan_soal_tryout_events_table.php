<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanSoalTryoutEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan_soal_tryout_event', function (Blueprint $table) {
            $table->increments('id_laporan_soal_tryout_event');
            $table->string('id_soal_tryout_event');
            $table->string('kategori');
            $table->text('pesan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporan_soal_tryout_event');
    }
}
