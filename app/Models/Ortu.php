<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ortu extends Model
{
    use HasFactory;

    public $fillable = [
        'user_id',
        'father_name',
        'father_nik',
        'father_birth_date',
        'father_place_birth',
        'father_profession',
        'father_last_education',
        'father_income',
        'mother_name',
        'mother_nik',
        'mother_birth_date',
        'mother_place_birth',
        'mother_profession',
        'mother_last_education',
        'mother_income',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
