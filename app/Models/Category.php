<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $fillable = [
        'title',
    ];

    // Опционально: slug
    public function getSlugAttribute()
    {
        return str($this->title)->slug();
    }

    // Пример связи: категории у постов (many-to-many)
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_category', 'category_id', 'post_id');
    }
}
