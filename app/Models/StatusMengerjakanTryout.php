<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusMengerjakanTryout extends Model
{
    use HasFactory;
    protected $table = 'status_mengerjakan_tryout';
    protected $guarded = [];
    public $primaryKey = 'id_status_mengerjakan_tryout';
    public $timestamps = FALSE;
}
