<?php

use App\Adapters\Env;
use App\Http\Middlewares\Cors;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        then: function () {
            Route::middleware('api')->group(function () {
                Route::prefix('v1')->group(function () {
                    if (Env::isLocal()) {
                        Route::group([], base_path('routes/test.php'));
                    }
                    
                    Route::prefix('auth')->name('auth.')->group(function () {
                        Route::group([], base_path('routes/v1/auth.php'));
                    });
                });
            });
        }
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->append(Cors::class);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
