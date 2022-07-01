<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\JenisViewSoal;

class CreateJenisViewSoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_view_soal', function (Blueprint $table) {
            $table->increments('id_jenis_view_soal');
            $table->string('jenis_view_soal');
        });

        $data_jenis = array(
            [
                'jenis_view_soal' => 'Text',
            ],
            [
                'jenis_view_soal' => 'Soal Bergambar',
            ],
            [
                'jenis_view_soal' => 'Jawaban Bergambar',
            ],
            [
                'jenis_view_soal' => 'Soal & Jawaban Bergambar',
            ],
            [
                'jenis_view_soal' => 'Soal Bergambar & Pembahasan Bergambar',
            ],
            [
                'jenis_view_soal' => 'Jawaban Bergambar & Pembahasan Bergambar',
            ],
            [
                'jenis_view_soal' => 'Soal, Jawaban & Jawaban Bergambar',
            ],
        );

        foreach ($data_jenis as $data) {
            $jenis_view = new JenisViewSoal();
            $jenis_view->jenis_view_soal = $data['jenis_view_soal'];
            $jenis_view->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jenis_view_soal');
    }
}
