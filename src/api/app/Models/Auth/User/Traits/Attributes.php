<?php

namespace App\Models\Auth\User\Traits;

trait Attributes
{
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getFillable(): array
    {
        return [
            'name',
            'email',
            'phone',
            'role_id',
            'password',
            'email_verified_at',
        ];
    }

    public function getHidden(): array
    {
        return [
            'password',
            'remember_token',
            'role_id',
        ];
    }
}
