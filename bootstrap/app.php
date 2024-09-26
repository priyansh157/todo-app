<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        api: __DIR__.'/../routes/api.php'
    )
    ->withMiddleware(function (Middleware $middleware) {
        // You can register global middleware here if needed.
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Custom exception handling (optional).
    })
    ->create();

/*
|--------------------------------------------------------------------------
| Middleware Groups and Route Middleware
|--------------------------------------------------------------------------
*/

// Define route middleware for Sanctum (Token Authentication)
$app->routeMiddleware([
    'auth:sanctum' => \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
]);

// Define the API middleware group with Sanctum and other middleware
$app->middlewareGroup('api', [
    \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class, // Sanctum middleware
    'throttle:api', // API rate-limiting
    \Illuminate\Routing\Middleware\SubstituteBindings::class, // Route model binding
]);
