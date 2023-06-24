<?php

namespace App\Providers;

use App\Models\Classes;
use App\Models\Subscription;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
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
        view()->composer('studo.includes.header', function ($view) {
            if (Auth::check()) {
                $user = Auth::user();
                $subscription_header = Subscription::join('classes', 'classes.id', '=', 'subscription.class_id')
                    ->where('subscription.user_id', $user->id)
                    ->get();
                session(['subscription_header' => $subscription_header]);
                $view->with('subscription_header', $subscription_header);
            }
        });
    }

}
