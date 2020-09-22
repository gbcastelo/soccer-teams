<?php

namespace App\Providers;

use App\Models\Player;
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
        if($this->app->environment('production')) {
            \Illuminate\Support\Facades\URL::forceScheme('https');
        }

        view()->share('players', Player::all());
        view()->share('players_confirmed', Player::where('confirmed', 1)->get());
        view()->share('players_confirmed_line', Player::where('confirmed', 1)->where('goalkeeper', 0)->get());
        view()->share('goalkeepers', Player::where('confirmed', 1)->where('goalkeeper', 1)->get());
    }
}
