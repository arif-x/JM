<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabelSoal extends Model
{
    use HasFactory;
    protected $table = 'label_soal';
    protected $guarded = [];
    public $primaryKey = 'id_label_soal';
    public $timestamps = FALSE;
}
