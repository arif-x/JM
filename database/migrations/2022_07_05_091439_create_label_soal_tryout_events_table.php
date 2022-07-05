<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLabelSoalTryoutEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('label_soal_tryout_event', function (Blueprint $table) {
            $table->increments('id_label_soal_tryout_event');
            $table->string('id_paket');
            $table->string('id_kategori');
            $table->string('id_jenis_kampus');
            $table->string('id_jenis_view_soal');
            $table->string('nama_label'); 
            $table->string('tgl_mulai'); 
            $table->string('tgl_end'); 
            $table->string('kupon');
            $table->string('slug'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('label_soal_tryout_event');
    }
}
