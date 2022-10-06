<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doc extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'akta', 
        'ijazah', 
        'family_card'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
