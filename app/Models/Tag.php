<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'title',
    ];

    // Опционально: автоматическое создание slug
    public function getSlugAttribute()
    {
        return str($this->title)->slug();
    }

    // Пример связи: теги у постов (many-to-many)
    // Допустим, у вас есть модель Post
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_tag', 'tag_id', 'post_id');
    }
}
