<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

// dump('step2');
return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        // admin: __DIR__.'/../routes/admin.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function () {
            Route::middleware('web')
                ->prefix('admin')
                // ->name('admin.')
                ->group(base_path('routes/admin.php'));
        },
    )
    ->withMiddleware(function (Middleware $middleware) {
        // $middleware->use([ //public middleware run automatically when u use route //can modify this delete or add wihtin this scope use it to add or delete (u should get all to avoid over ride)
        //     // \Illuminate\Http\Middleware\TrustHosts::class,
        //     \Illuminate\Http\Middleware\TrustProxies::class,
        //     \Illuminate\Http\Middleware\HandleCors::class,
        //     \Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance::class,
        //     \Illuminate\Http\Middleware\ValidatePostSize::class,
        //     \Illuminate\Foundation\Http\Middleware\TrimStrings::class,
        //     \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
        // ]);

        // $middleware->append([ //add a new middleware in public (registered at  last)
        //     App\http\Middleware\IsAdmin::class
        // ]);
        // $middleware->prepend([ //add a new middleware in public (registered at first)
        //     App\http\Middleware\IsAdmin::class
        // ]);

        //Custem middleware
        $middleware->alias([
            'IsAdmin'=>App\Http\Middleware\IsAdmin::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
