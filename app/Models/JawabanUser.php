<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawabanUser extends Model
{
    use HasFactory;
    protected $table = 'jawaban_user';
    protected $guarded = [];
    public $primaryKey = 'id_jawaban_user';
    public $timestamps = FALSE;
}
