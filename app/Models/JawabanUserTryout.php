<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawabanUserTryout extends Model
{
    use HasFactory;
    protected $table = 'jawaban_user_tryout';
    protected $guarded = [];
    public $primaryKey = 'id_jawaban_user_tryout';
    public $timestamps = FALSE;
}
