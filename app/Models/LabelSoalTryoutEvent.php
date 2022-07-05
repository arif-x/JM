<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabelSoalTryoutEvent extends Model
{
    use HasFactory;
    protected $table = 'label_soal_tryout_event';
    protected $guarded = [];
    public $primaryKey = 'id_label_soal_tryout_event';
    public $timestamps = FALSE;
}
