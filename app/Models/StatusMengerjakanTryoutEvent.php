<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusMengerjakanTryoutEvent extends Model
{
    use HasFactory;
    protected $table = 'status_mengerjakan_tryout_event';
    protected $guarded = [];
    public $primaryKey = 'id_status_mengerjakan_tryout_event';
    public $timestamps = FALSE;
}
