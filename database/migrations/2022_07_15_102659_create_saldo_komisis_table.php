<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaldoKomisisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saldo_komisi', function (Blueprint $table) {
            $table->increments('id_saldo_komisi');
            $table->string('id_user');
            $table->string('email_referrer');
            $table->string('email_referee');
            $table->string('id_referrer');
            $table->string('id_referee');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('saldo_komisi');
    }
}
