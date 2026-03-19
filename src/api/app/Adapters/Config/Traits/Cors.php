<?php

namespace App\Adapters\Config\Traits;

trait Cors
{
    public static function allowedOrigins(array $default = []): array
    {
        return self::getCorsKey('allowed_origins', $default);
    }

    public static function allowedMethods(array $default = []): string
    {
        return implode(', ', self::getCorsKey('allowed_methods', $default));
    }

    public static function allowedHeaders(array $default = []): string
    {
        return implode(', ', self::getCorsKey('allowed_headers', $default));
    }

    public static function exposedHeaders(array $default = []): string
    {
        return implode(', ', self::getCorsKey('exposed_headers', $default));
    }

    public static function maxAge(int $default = 0): int
    {
        return self::getCorsKey('max_age', $default);
    }

    public static function supportsCredentials(bool $default = true): string
    {
        return self::getCorsKey('supports_credentials', $default) ? 'true' : 'false';
    }

    private static function getCorsKey(string $key, mixed $default): mixed
    {
        return self::get("cors.$key", $default);
    }
}
