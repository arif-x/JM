<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SliderKecil extends Model
{
    use HasFactory;
    protected $table = 'slider_kecil';
    protected $guarded = [];
    public $primaryKey = 'id_slider_kecil';
    public $timestamps = FALSE;
}
