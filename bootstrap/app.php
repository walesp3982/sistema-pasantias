<?php

use App\Http\Middleware\PreventBackHistory;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Symfony\Component\HttpKernel\Exception\HttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'prevent-back' => PreventBackHistory::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->respond(function($response, $exception, $request) {
            if($exception instanceof HttpException && $exception->getStatusCode() == 419) {
                if ($request->expectsJson()) {
                    return response()->json([
                        'message' => 'Tu sesión ha expirado. Por favor, recarga la página.',
                        'redirect' => route('login')
                    ], 419);
                }
                
                // Si es una petición normal
                return redirect()->route('welcome')
                    ->with('error', 'Tu sesión ha expirado. Por favor, inicia sesión nuevamente.');
            }
        });
    })->create();
