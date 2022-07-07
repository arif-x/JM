<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubJenisSoal extends Model
{
    use HasFactory;
    protected $table = 'sub_jenis_soal';
    protected $guarded = [];
    public $primaryKey = 'id_sub_jenis_soal';
    public $timestamps = FALSE;
}
