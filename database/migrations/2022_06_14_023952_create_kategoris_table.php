<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Kategori;

class CreateKategorisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategori', function (Blueprint $table) {
            $table->increments('id_kategori');
            $table->string('nama_kategori');
        });

        $data_kategori = array(
            [
                'nama_kategori' => 'SAINTEK',
            ],
            [
                'nama_kategori' => 'SOSHUM',
            ]
        );

        foreach ($data_kategori as $data){
            $kategori = new Kategori();
            $kategori->nama_kategori =$data['nama_kategori'];
            $kategori->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kategori');
    }
}
