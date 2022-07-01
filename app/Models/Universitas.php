<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Universitas extends Model
{
    use HasFactory;
    protected $table = 'universitas';
    protected $guarded = [];
    public $primaryKey = 'id_universitas';
    public $timestamps = FALSE;
}
