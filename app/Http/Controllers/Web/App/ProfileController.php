<?php

namespace App\Http\Controllers\Web\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('app.profile.index');
    }

    public function info()
    {
        return view('app.profile.info');
    }

    public function password()
    {
        return view('app.profile.password');
    }

    public function security()
    {
        return view('app.profile.security');
    }

    public function sessions()
    {
        return view('app.profile.sessions');
    }

    public function deleteAccount()
    {
        return view('app.profile.delete-account');
    }
}
