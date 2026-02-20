<?php

use App\Http\Middleware\EnsureInternHasNoProfile;
use App\Http\Middleware\EnsureInternHasProfile;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        
        $middleware->redirectUsersTo(fn (Request $request) => 
            match (true) {
                $request->user()->hasRole('admin') => route('dashboard'),
                $request->user()->hasRole('intern') => route('dashboard.intern'),
                default => route('home'),
            }
        );

        $middleware->alias([
            'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
            'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
            'role_or_permission' => \Spatie\Permission\Middleware\RoleOrPermissionMiddleware::class,
        ]);

        $middleware->appendToGroup('intern-profile', [
            EnsureInternHasProfile::class
        ]);
        $middleware->appendToGroup('intern-no-profile', [
            EnsureInternHasNoProfile::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
