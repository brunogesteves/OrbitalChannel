<?php

namespace Core\Middleware;





class Middleware
{
    public const MAP = [
        "auth" => Auth::class,
    ];

    public static function resolve($key)
    {

        if (!$key) {
            return;
        }

        $middleware = static::MAP[$key] ?? false;
        if ($middleware)
            (new $middleware)->handle();
    }
}