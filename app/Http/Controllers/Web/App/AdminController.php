<?php

namespace App\Http\Controllers\Web\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class AdminController extends Controller
{
    public function index()
    {
        $role = Role::where('name', 'admin')->first();
        $users = User::where('role_id', $role->id)->get();

        return view('app.admin.index', [
            'users' => $users
        ]);
    }

    public function edit(Request $request, $id)
    {
        $this->validate($request, [
            'id' => 'required|exists:users,id'
        ],[
            'id.required' => 'El id es requerido',
            'id.exists' => 'El id no existe'
        ]);

        $user = User::find($id);

        return view('app.admin.edit', [
            'user' => $user
        ]);
    }
}
