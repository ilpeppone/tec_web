<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;
use App\Http\Middleware\AdminMiddleware; // Importa il middleware

class Kernel extends HttpKernel
{


    protected $middlewarePriority = [
        \App\Http\Middleware\AdminMiddleware::class,
        // other middlewares...
    ];

    
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        // I middleware globali qui
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            // I middleware per il gruppo web
        ],

        'api' => [
            // I middleware per il gruppo api
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        // Altri middleware
        'admin' => AdminMiddleware::class,  // Registrazione del middleware admin
    ];
}
