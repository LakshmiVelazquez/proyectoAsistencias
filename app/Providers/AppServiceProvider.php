<?php

namespace App\Providers;

use Auth;
use View;
use App\Models\AlumnoAsistencia;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View()->composer('*', function ($view) {
            $asistenciasNav = AlumnoAsistencia::whereDate('fecha',date('Y-m-d'))->take(5)->get();
            View::share([
                'asistenciasNav' => $asistenciasNav
            ]);
        });
    }
}
