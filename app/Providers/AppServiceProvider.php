<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Resources\Json\JsonResource;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Evita errori di lunghezza delle stringhe nei database MySQL
        Schema::defaultStringLength(191);

        // Disabilita il wrapping dei dati nelle API per avere JSON puliti
        JsonResource::withoutWrapping();
    }
}
