<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Palakasan extends Model
{
    use HasFactory;

    protected $table = 'palakasan';

    protected $fillable = [
        'year',
        'theme',
        'tagline',
        'description',
        'startDate',
        'endDate',
        'status'
    ];

    protected $casts = [
        'year' => 'integer',
        'startDate' => 'date',
        'endDate' => 'date',
        'status' => 'boolean',
    ];

}
