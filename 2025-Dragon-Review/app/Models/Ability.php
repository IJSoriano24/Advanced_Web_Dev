<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ability extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
        // 'user_id',

    ];

    /**
     * Get the user that created the ability.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function dragon()
    {
        return $this->belongsTo(Dragon::class);
    }
}