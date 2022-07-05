<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoalTryoutEvent extends Model
{
    use HasFactory;
    protected $table = 'soal_tryout_event';
    protected $guarded = [];
    public $primaryKey = 'id_soal_tryout_event';
    public $timestamps = FALSE;
}
