<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'body',
        'author',
        'chat',
        'answer',
        'repost',
    ];

    protected $casts = [
        'repost' => 'boolean',
    ];

    // Связь: сообщение принадлежит чату
    public function chat()
    {
        return $this->belongsTo(Chat::class);
    }

    // Связь: сообщение — ответ на другое сообщение
    public function answerMessage()
    {
        return $this->belongsTo(Message::class, 'answer', 'id');
    }

    // Связь: дочерние сообщения (ответы)
    public function replies()
    {
        return $this->hasMany(Message::class, 'answer', 'id');
    }

    // Атрибут: сокращённое тело
    public function getShortBodyAttribute()
    {
        return strlen($this->body) > 100
            ? substr($this->body, 0, 97) . '...'
            : $this->body;
    }
}
