<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable = [
        'title',
        'members',
        'status',
    ];

    protected $casts = [
        'members' => 'integer',
    ];

    // Опционально: ограничение значений status
    public function getStatusLabelAttribute()
    {
        return match($this->status) {
            'active' => '🟢 Active',
            'archived' => '📦 Archived',
            'deleted' => '🗑️ Deleted',
            default => '❓ Unknown'
        };
    }
}
