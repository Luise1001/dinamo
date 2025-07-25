<?php

namespace App\Providers;

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
use Laravel\Jetstream\Jetstream;

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
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        Fortify::loginView(function () {
            return view('app.auth.login');
        });

        Fortify::registerView(function () {
            return view('app.auth.register');
        });

        Fortify::requestPasswordResetLinkView(function () {
            return view('app.auth.forgot-password');
        });

        Fortify::resetPasswordView(function ($request) {
            return view('app.auth.reset-password', ['request' => $request]);
        });

        Fortify::verifyEmailView(function () {
            return view('app.auth.verify-email');
        });

        Fortify::confirmPasswordView(function () {
            return view('app.auth.confirm-password');
        });

        Fortify::twoFactorChallengeView(function () {
            return view('app.auth.two-factor-challenge');
        });


        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())).'|'.$request->ip());

            return Limit::perMinute(5)->by($throttleKey);
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
    }
}
