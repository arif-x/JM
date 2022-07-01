<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJawabanUserTryoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawaban_user_tryout', function (Blueprint $table) {
            $table->increments('id_jawaban_user_tryout');
            $table->string('id_user');
            $table->string('id_label_soal_tryout');
            $table->string('tgl_mengerjakan');
            $table->string('id_soal_tryout');
            $table->string('jawaban_user_tryout');
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
        Schema::dropIfExists('jawaban_user_tryout');
    }
}
