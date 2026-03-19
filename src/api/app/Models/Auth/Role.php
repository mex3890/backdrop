<?php

namespace App\Models\Auth;

use App\Models\Contracts\Model;

class Role extends Model
{
    protected $fillable = [
        'name',
        'scopes',
    ];

    protected $casts = [
        'scopes' => 'array',
    ];
}
