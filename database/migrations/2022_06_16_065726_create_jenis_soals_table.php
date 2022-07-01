<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\JenisSoal;

class CreateJenisSoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_soal', function (Blueprint $table) {
            $table->increments('id_jenis_soal');
            $table->string('jenis_soal');
        });

        $data_jenis = array(
            [
                'jenis_soal' => 'TPS',
            ],
            [
                'jenis_soal' => 'Bahasa Inggris',
            ],
            [
                'jenis_soal' => 'TKA',
            ],
        );

        foreach ($data_jenis as $data) {
            $jenis_soal = new JenisSoal();
            $jenis_soal->jenis_soal = $data['jenis_soal'];
            $jenis_soal->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jenis_soal');
    }
}
