<?php

namespace App\Http\Controllers\Web\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $role = Role::where('name', 'user')->first();
        $users = User::where('role_id', $role->id)->get();

        return view('app.users.index', [
            'users' => $users
        ]);
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('app.users.edit', [
            'user' => $user
        ]);
    }
}
