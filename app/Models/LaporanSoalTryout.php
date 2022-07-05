<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanSoalTryout extends Model
{
    use HasFactory;
    protected $table = 'laporan_soal_tryout';
    protected $guarded = [];
    public $primaryKey = 'id_laporan_soal_tryout';
    public $timestamps = FALSE;
}
