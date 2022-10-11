<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'meta',
        'slug',
        'cover_image',
        'content',
        'created_by',
        'updated_by',
        'short_describtion'
    ];
    
    public function category()
    {
        return $this->belongsTo(ArticleCategory::class);
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }
}
