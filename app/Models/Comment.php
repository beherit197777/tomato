<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'comment',
        'body',
        'author',
        'post',
        'parent',
        'likes',
    ];

    protected $casts = [
        'likes' => 'integer',
    ];

    // Связь: комментарий принадлежит посту (предположим, есть модель Post)
    public function postRelation()
    {
        return $this->belongsTo(Post::class, 'post', 'id'); // post — поле, id — ключ в Post
    }

    // Связь: родительский комментарий
    public function parentComment()
    {
        return $this->belongsTo(Comment::class, 'parent', 'id');
    }

    // Связь: дочерние комментарии
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent', 'id');
    }
}
