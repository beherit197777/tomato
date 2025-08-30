<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'title',
    ];

    // Slug для URL
    public function getSlugAttribute()
    {
        return \Illuminate\Support\Str::slug($this->title);
    }

    // Пример связи: пользователи с этой ролью
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_roles', 'role_id', 'user_id');
    }
}
