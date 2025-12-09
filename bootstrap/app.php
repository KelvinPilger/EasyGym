<?php

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
		$middleware->group('api', [
			EnsureFrontendRequestsAreStateful::class,
			\Illuminate\Routing\Middleware\SubstituteBindings::class,
		]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {

        $exceptions->render(function (AccessDeniedHttpException $e, Request $request) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Você não tem permissão para executar esta ação.',
                    'exception' => $e->getMessage()
                ], Response::HTTP_FORBIDDEN);
            }

            return response()->view('errors.403', [
                'message' => $e->getMessage() ?: 'Você não tem permissão para executar esta ação.',
            ], Response::HTTP_FORBIDDEN);
        });

    })->create();
