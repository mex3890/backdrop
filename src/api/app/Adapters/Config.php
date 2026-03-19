<?php

namespace App\Adapters;

use App\Adapters\Config\Traits\Cors;
use Illuminate\Support\Facades\Config as ConfigFacade;

class Config extends ConfigFacade
{
    use Cors;

    public static function jwtExpirationMinutes(): int
    {
        return static::get('jwt.ttl', 60);
    }

    public static function getDefaultUserRoleId(): string
    {
        return Role::query()
            ->where('name', '=', static::getDefaultUserRoleName())
            ->first()
            ->id;
    }

    public static function getDefaultUserRoleName(): string
    {
        return static::get('default_role_name', 'User');
    }

    public static function getEmailVerifyCodeLength(): int
    {
        return self::get('email_verify_code_length', 5);
    }

    public static function getEmailVerifyCodeExpirationMinutes(): int
    {
        return self::get('email_verify_code_expiration_minutes', 60);
    }

    public static function getPasswordResetCodeExpirationMinutes(): int
    {
        return self::get('password_reset_code_expiration_minutes', 60);
    }

    public static function getFrontendPasswordResetUrl(): string
    {
        return self::get('frontend_reset_password_url');
    }

    public static function getFrontendHost(string $default = ''): string
    {
        return self::get('app.frontend_host', $default);
    }
}
