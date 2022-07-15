<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaldoKomisi extends Model
{
    use HasFactory;
    protected $table = 'saldo_komisi';
    protected $guarded = [];
    public $primaryKey = 'id_saldo_komisi';
    public $timestamps = FALSE;
}
