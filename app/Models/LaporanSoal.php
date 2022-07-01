<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanSoal extends Model
{
    use HasFactory;
    protected $table = 'laporan_soal';
    protected $guarded = [];
    public $primaryKey = 'id_laporan_soal';
    public $timestamps = FALSE;
}
