<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable = [
        'article_id',
        'username',
        'coment',
        'like'
    ];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
