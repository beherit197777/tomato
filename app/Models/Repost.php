<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Repost extends Model
{
    protected $fillable = [
        'parent',
        'user_id',
    ];

    // Связь: репост относится к сообщению (оригиналу)
    public function message()
    {
        return $this->belongsTo(Message::class, 'parent', 'id');
    }

    // Связь: репост сделан пользователем
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
