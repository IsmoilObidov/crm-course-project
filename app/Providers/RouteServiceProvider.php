<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            Route::prefix('system')
                ->middleware(['web', 'auth', 'SYSTEM'])
                ->namespace($this->namespace)
                ->group(base_path('routes/system/index.php'));

            Route::prefix('admin')
                ->middleware(['web', 'auth', 'admin'])
                ->namespace($this->namespace)
                ->group(base_path('routes/admin/index.php'));

            Route::prefix('registrator')
                ->middleware(['web', 'auth', 'registrator'])
                ->namespace($this->namespace)
                ->group(base_path('routes/registrator/index.php'));

            Route::prefix('teacher')
                ->middleware(['web', 'auth', 'teacher'])
                ->namespace($this->namespace)
                ->group(base_path('routes/teacher/index.php'));

            Route::prefix('pupil')
                ->middleware(['web', 'auth', 'pupil'])
                ->namespace($this->namespace)
                ->group(base_path('routes/pupil/index.php'));
        });
    }
}
