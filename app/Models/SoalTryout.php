<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoalTryout extends Model
{
    use HasFactory;
    protected $table = 'soal_tryout';
    protected $guarded = [];
    public $primaryKey = 'id_soal_tryout';
    public $timestamps = FALSE;
}
