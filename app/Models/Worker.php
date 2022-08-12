<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;
    protected $fillable = [
        'surname',
        'name',
        'patronymic',
        'position',
        'passport',
        'position_id'

    ];
}
