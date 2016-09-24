<?php

namespace App\Providers;

use App\Src\Models\GuestService;
use App\Src\Models\Photographer;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Relation::morphMap([
            'photographer' => Photographer::class,
            'guestservice' => GuestService::class,
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
