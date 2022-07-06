<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabelMateri extends Model
{
    use HasFactory;
    protected $table = 'label_materi';
    protected $guarded = [];
    public $primaryKey = 'id_label_materi';
    public $timestamps = FALSE;
}
