<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    protected $fillable = [
        'title',
        'description',
        'group',
        'replies_count',
    ];

    // Связь: тема принадлежит группе
    public function group()
    {
        return $this->belongsTo(Group::class, 'group', 'id'); // поле group → id в groups
    }

    // Связь: сообщения в теме
    public function messages()
    {
        return $this->hasMany(Message::class, 'theme_id');
    }

    // Атрибут: количество сообщений (кроме первого)
    public function getRepliesCountAttribute($value)
    {
        return $value ?? $this->messages()->count() - 1;
    }

    // Slug для URL
    public function getSlugAttribute()
    {
        return \Illuminate\Support\Str::slug($this->title);
    }

    // Полный URL
    public function getUrlAttribute()
    {
        return route('themes.show', [$this->group->slug ?? $this->group->id, $this->slug]);
    }
}
