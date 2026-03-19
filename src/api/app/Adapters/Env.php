<?php

namespace App\Adapters;

use Illuminate\Support\Env as BaseEnv;

class Env extends BaseEnv
{
    public static function isLocal(): bool
    {
        return static::get('APP_ENV') === 'local';
    }

    public static function isNotLocal(): bool
    {
        return !self::isLocal();
    }
}
