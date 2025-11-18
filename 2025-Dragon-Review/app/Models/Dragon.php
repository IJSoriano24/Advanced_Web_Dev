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
        'image',
        'created_at',
        'updated_at',
    ];

    public function abilities()
    {
        return $this->hasMany(Ability::class);
    }

        public function vikings()
    {
        return $this->belongsToMany(Viking::class);
    }

}
