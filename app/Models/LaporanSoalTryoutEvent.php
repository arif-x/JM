<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanSoalTryoutEvent extends Model
{
    use HasFactory;
    protected $table = 'laporan_soal_tryout_event';
    protected $guarded = [];
    public $primaryKey = 'id_laporan_soal_tryout_event';
    public $timestamps = FALSE;
}
