<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomeExpanse extends Model
{
    use HasFactory;
    protected $fillable = [
        'value',
        'currency',
        'type_id',
        'comment',
        'user_id',
        'datetime',
    ];
}
