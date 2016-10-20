<?php

namespace App\Providers;

use App\Src\Models\Buffet;
use App\Src\Models\BuffetPackage;
use App\Src\Models\GuestService;
use App\Src\Models\Hall;
use App\Src\Models\LightService;
use App\Src\Models\Message;
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
            'photographers' => Photographer::class,
            'guestServices' => GuestService::class,
            'messages' => Message::class,
            'lightServices' => LightService::class,
            'buffetPackages' => BuffetPackage::class,
            'buffets' => Buffet::class,
            'halls' => Hall::class
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
