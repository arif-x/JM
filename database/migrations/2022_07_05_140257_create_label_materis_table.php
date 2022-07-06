<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLabelMaterisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('label_materi', function (Blueprint $table) {
            $table->increments('id_label_materi');
            $table->string('id_paket');
            $table->string('id_kategori');
            $table->string('id_jenis_kampus');
            $table->string('nama_label'); 
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
        Schema::dropIfExists('label_materi');
    }
}
