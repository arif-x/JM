<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusMengerjakanTryoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_mengerjakan_tryout', function (Blueprint $table) {
            $table->increments('id_status_mengerjakan_tryout');
            $table->string('id_user');
            $table->string('id_label_soal_tryout');
            $table->string('waktu_mengerjakan');
            $table->string('waktu_berakhir');
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('status_mengerjakan_tryout');
    }
}
