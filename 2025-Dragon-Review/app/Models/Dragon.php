<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dragon extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'color',
        'personality',
        'image'
    ]
}
