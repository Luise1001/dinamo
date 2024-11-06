<?php

namespace App\Http\Controllers\Web\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function index()
    {
        return Socialite::driver('google')->redirect();
    }

    public function login()
    {
        $role = Role::where('name', 'user')->first();
        $googleUser = Socialite::driver('google')->user();

        $user = User::firstOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'name' => $googleUser->getName(),
                'password' => bcrypt(Str::random(24)),
                'email_verified_at' => Carbon::now(),
                'role_id' => $role->id
            ]
        );

        Auth::login($user);

        return redirect()->route('dashboard');
    }

}
