<?php

namespace App\Models\Auth\User\Traits;

use App\Models\Auth\Role;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait Relations
{
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }
}
