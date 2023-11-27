<?php

namespace App\Providers;

use App\Models\Cart;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

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
        if (App::environment(['staging', 'production'])) {
            URL::forceScheme('https');
        }

        config(['app.locale' => 'id']);
        Carbon::setLocale('id');

        view()->composer('*', function (View $view) {
            $cartCount = 0;
            if (Auth::check()) {
                if (Auth::user()->role->_id == '2') {
                    $cartCount = Cart::where('user_id', Auth::user()->_id)->get()->count();
                }
            }
            $view->with('cartCount', $cartCount);
        });
    }
}
