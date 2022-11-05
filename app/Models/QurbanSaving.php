<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QurbanSaving extends Model
{
    use HasFactory;

    public $fillable = [
        'user_id',
        'is_accept',
        'qurban',
        'qurban_type',
        'instalment'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
