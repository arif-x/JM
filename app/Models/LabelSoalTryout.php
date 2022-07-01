<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabelSoalTryout extends Model
{
    use HasFactory;
    protected $table = 'label_soal_tryout';
    protected $guarded = [];
    public $primaryKey = 'id_label_soal_tryout';
    public $timestamps = FALSE;
}
