<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SliderBesar extends Model
{
    use HasFactory;
    protected $table = 'slider_besar';
    protected $guarded = [];
    public $primaryKey = 'id_slider_besar';
    public $timestamps = FALSE;
}
