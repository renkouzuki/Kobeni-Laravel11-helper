<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

$enableSessionMiddleware = env('SESSION_MIDDLEWARE_ENABLED', false);

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) use ($enableSessionMiddleware) {
        if ($enableSessionMiddleware) {
            $middleware->api(append: [
                \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
                \Illuminate\Session\Middleware\StartSession::class
            ]);
        }
        $middleware->alias([

        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
