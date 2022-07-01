<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKampus extends Model
{
    use HasFactory;
    protected $table = 'jenis_kampus';
    protected $guarded = [];
    public $primaryKey = 'id_jenis_kampus';
    public $timestamps = FALSE;
}
