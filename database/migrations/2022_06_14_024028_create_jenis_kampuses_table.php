<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\JenisKampus;

class CreateJenisKampusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_kampus', function (Blueprint $table) {
            $table->increments('id_jenis_kampus');
            $table->string('nama_jenis_kampus');
        });

        $data_jenis_kampus = array(
            [
                'nama_jenis_kampus' => 'UMUM',
            ],
            [
                'nama_jenis_kampus' => 'PTKIN',
            ]
        );

        foreach ($data_jenis_kampus as $data){
            $jenis_kampus = new JenisKampus();
            $jenis_kampus->nama_jenis_kampus =$data['nama_jenis_kampus'];
            $jenis_kampus->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jenis_kampus');
    }
}
