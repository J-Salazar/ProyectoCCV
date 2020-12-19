<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapDesarrolladorRoutes();

        $this->mapUsuarioRoutes();

        $this->mapAdministradorRoutes();

        //
    }

    /**
     * Define the "administrador" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapAdministradorRoutes()
    {
        Route::group([
            'middleware' => ['web', 'administrador', 'auth:administrador'],
            'prefix' => 'administrador',
            'as' => 'administrador.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/administrador.php');
        });
    }

    /**
     * Define the "usuario" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapUsuarioRoutes()
    {
        Route::group([
            'middleware' => ['web', 'usuario', 'auth:usuario'],
            'prefix' => 'usuario',
            'as' => 'usuario.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/usuario.php');
        });
    }

    /**
     * Define the "desarrollador" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapDesarrolladorRoutes()
    {
        Route::group([
            'middleware' => ['web', 'desarrollador', 'auth:desarrollador'],
            'prefix' => 'desarrollador',
            'as' => 'desarrollador.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/desarrollador.php');
        });
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
