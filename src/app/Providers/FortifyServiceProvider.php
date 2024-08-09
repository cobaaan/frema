<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
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
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::registerView(function () {
            return view('auth.register');
        });
        
        Fortify::loginView(function () {
            return view('auth.login');
        });
        
        RateLimiter::for('login', function (Request $request) {
            $email = (string) $request->email;
            
            return Limit::perMinute(10)->by($email . $request->ip());
        });
        
        Fortify::authenticateUsing(function (Request $request) {
            $credentials = $request->only('email', 'password');
            
            if (Auth::guard('web')->attempt($credentials)) {
                return Auth::guard('web')->user();
            }
            
            if (Auth::guard('admin')->attempt($credentials)) {
                return Auth::guard('admin')->user();
            }
            
            return null;
        });
    }
}
