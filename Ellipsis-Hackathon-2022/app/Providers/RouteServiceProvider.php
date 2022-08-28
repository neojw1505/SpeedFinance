<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
use Vinkla\Hashids\Facades\Hashids;

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
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();

        Route::bind('user', function ($value, $route) {
            return $this->getModel(\App\User::class, $value);
        });
    
        Route::bind('company', function ($value, $route) {
            return $this->getModel(\App\Company::class, $value);
        });

        Route::bind('application', function ($value, $route) {
            return $this->getModel(\App\Application::class, $value);
        });
    
        Route::bind('approver', function ($value, $route) {
            return $this->getModel(\App\Approver::class, $value);
        });

        Route::bind('checklist', function ($value, $route) {
            return $this->getModel(\App\Checklist::class, $value);
        });

        Route::bind('contact', function ($value, $route) {
            return $this->getModel(\App\Contact::class, $value);
        });

        Route::bind('file', function ($value, $route) {
            return $this->getModel(\App\File::class, $value);
        });

        Route::bind('industry', function ($value, $route) {
            return $this->getModel(\App\Industry::class, $value);
        });

        Route::bind('note', function ($value, $route) {
            return $this->getModel(\App\Note::class, $value);
        });

        Route::bind('reminder', function ($value, $route) {
            return $this->getModel(\App\Reminder::class, $value);
        });

    }

    private function getModel($model, $routeKey)
    {
        $id = Hashids::connection($model)->decode($routeKey)[0] ?? null;
    
        $modelInstance = resolve($model);

        return  $modelInstance->findOrFail($id);
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

        //
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
