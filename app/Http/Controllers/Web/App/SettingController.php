<?php

namespace App\Http\Controllers\Web\App;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Contracts\Session\Session;

class SettingController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $permissions = $user->role->permissions->where('hidden', false);

        return view('app.settings.index', [
            'permissions' => $permissions
        ]);
    }
}
