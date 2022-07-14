<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kebijakan extends Model
{
    use HasFactory;
    protected $table = 'kebijakan';
    protected $guarded = [];
    public $primaryKey = 'id_kebijakan';
    public $timestamps = FALSE;
}
