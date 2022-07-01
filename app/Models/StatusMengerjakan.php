<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusMengerjakan extends Model
{
    use HasFactory;
    protected $table = 'status_mengerjakan';
    protected $guarded = [];
    public $primaryKey = 'id_status_mengerjakan';
    public $timestamps = FALSE;
}
