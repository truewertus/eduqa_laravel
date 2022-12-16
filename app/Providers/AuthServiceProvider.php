<?php
namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
//use App\MyEasyAuth\User;
use App\User;
use App\MyEasyAuth\myUserProvider;
use Illuminate\Support\Facades\Auth;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('show-result', function(User $user){
            return isset($user) && $user->type == 2;
        });

        //$this->app->bind('App\MyEasyAuth\UserModel', function());
        /*
        $this->app->bind('Illuminate\Contracts\Auth\Authenticatable', function($app){
            return new User();
        });

        $this->app->bind('Illuminate\Contracts\Auth\UserProvider', function($app){
            return new myUserProvider();
        });

        Auth::provider('myTest', function ($app, array $config) {
            return new myUserProvider($app->make('App\MyEasyAuth\userModel'));
        });
        */
        //
    }
}
