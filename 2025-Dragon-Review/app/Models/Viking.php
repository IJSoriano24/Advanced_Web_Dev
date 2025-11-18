<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viking extends Model
{
    use HasFactory;

    protected $fillable = ['image', 'name', 'bio'];

    // viking can have many dragons
    public function dragons()
    {
        return $this->belongsToMany(Dragon::class); //many-to-many relationship}
    }
}