<?php

namespace App\Http\Controllers\Web\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function index()
    {
        return Socialite::driver('google')->redirect();
    }

    public function login()
    {
        $googleUser = Socialite::driver('google')->user();

        $user = User::firstOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'name' => $googleUser->getName(),
                'password' => bcrypt(Str::random(24)),
                'role_id' => 2
            ]
        );

        Auth::login($user);

        return redirect()->route('dashboard');
    }

}
