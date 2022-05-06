<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'naziv_knjige',
        'autor',
        'izdavac',
        'godina_izdanja',
    ];

}
