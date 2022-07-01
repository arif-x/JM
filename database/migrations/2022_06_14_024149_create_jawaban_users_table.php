<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJawabanUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawaban_user', function (Blueprint $table) {
            $table->increments('id_jawaban_user');
            $table->string('id_user');
            $table->string('id_label_soal');
            $table->string('tgl_mengerjakan');
            $table->string('jawaban_user');
            $table->string('skor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jawaban_user');
    }
}
