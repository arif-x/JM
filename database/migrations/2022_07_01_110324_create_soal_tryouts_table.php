<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoalTryoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soal_tryout', function (Blueprint $table) {
            $table->increments('id_soal_tryout');
            $table->string('id_label_soal_tryout');
            $table->text('soal_tryout');
            $table->text('a');
            $table->text('b');
            $table->text('c');
            $table->text('d');
            $table->text('e');
            $table->string('kunci');
            $table->text('pembahasan');
            $table->text('slug');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('soal_tryout');
    }
}
