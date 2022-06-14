<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billboard extends Model
{
    use HasFactory;

    protected $fillable = [
        'latitude',
        'langitude',
        'type',
        'address',
        'number',
        'size',
        'img',
    ];
}
