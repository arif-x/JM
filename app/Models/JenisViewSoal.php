<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisViewSoal extends Model
{
    use HasFactory;
    protected $table = 'jenis_view_soal';
    protected $guarded = [];
    public $primaryKey = 'id_jenis_view_soal';
    public $timestamps = FALSE;
}
