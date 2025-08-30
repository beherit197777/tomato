<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'name',
        'gender',
        'country',
        'birthed_at',
        'is_married',
        'avatar',
    ];

    protected $casts = [
        'birthed_at' => 'date',
        'is_married' => 'boolean',
    ];
}
