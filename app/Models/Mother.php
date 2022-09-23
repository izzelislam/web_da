<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mother extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'birth_date',
        'place_birth',
        'profession',
        'last_education',
        'income',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
