<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawabanUserTryoutEvent extends Model
{
    use HasFactory;
    protected $table = 'jawaban_user_tryout_event';
    protected $guarded = [];
    public $primaryKey = 'id_jawaban_user_tryout_event';
    public $timestamps = FALSE;
}
