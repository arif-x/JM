<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fitur extends Model
{
    use HasFactory;
    protected $table = 'fitur';
    protected $guarded = [];
    public $primaryKey = 'id_fitur';
    public $timestamps = FALSE;
}
