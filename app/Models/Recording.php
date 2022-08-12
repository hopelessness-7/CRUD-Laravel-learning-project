<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recording extends Model
{
    use HasFactory;
    protected $fillable = [
        'worker_id',
        'cabinet_id',
        'arrival_date',
        'departure_date',
    ];
}
