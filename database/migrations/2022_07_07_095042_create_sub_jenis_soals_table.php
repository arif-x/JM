<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubJenisSoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_jenis_soal', function (Blueprint $table) {
            $table->increments('id_sub_jenis_soal');
            $table->string('id_jenis_soal');
            $table->string('sub_jenis_soal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_jenis_soal');
    }
}
