<?php
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {

        // REGISTER ROUTE MIDDLEWARE (pengganti Kernel.php)
        $middleware->alias([
            'admin.berita'  => \App\Http\Middleware\IsAdminBerita::class,
            'admin.jurusan' => \App\Http\Middleware\IsAdminJurusan::class,
            'superadmin'    => \App\Http\Middleware\IsSuperAdmin::class,
        ]);

    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })
    ->create();
