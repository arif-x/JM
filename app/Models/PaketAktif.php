<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketAktif extends Model
{
    use HasFactory;
    protected $table = 'paket_aktif';
    protected $guarded = [];
    public $primaryKey = 'id_paket_aktif';
    public $timestamps = FALSE;
}
