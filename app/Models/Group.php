<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'title',
        'description',
        'members',
        'avatar',
        'author',
    ];

    // Slug для красивых URL
    public function getSlugAttribute()
    {
        return \Illuminate\Support\Str::slug($this->title);
    }

    // Полный URL группы
    public function getUrlAttribute()
    {
        return route('groups.show', $this->slug);
    }

    // Пример связи: сообщения в группе
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    // Пример связи: участники (если будет таблица group_user)
    public function users()
    {
        return $this->belongsToMany(User::class, 'group_user');
    }
}
