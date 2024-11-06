<?php

namespace App\Http\Controllers\Web\App;

use Illuminate\Http\Request;
use App\Http\Requests\Web\App\RoleRequest;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        return view('app.roles.index');
    }

    public function create()
    {
        return view('app.roles.create');
    }

    public function store(RoleRequest $request)
    {
        Role::create($request->all());

        return redirect()->route('roles')->withSuccess('Rol creado correctamente');
    }

    public function edit(Request $request, $id)
    {
        $this->validate($request, [
            'id' => 'required|exists:roles,id'
        ],[
            'id.required' => 'El id es requerido',
            'id.exists' => 'El id no existe'
        ]);

        $role = Role::with('permissions')->where('id', $id)->first();
        $permissions = Permission::where('active', true)->get();

        return view('app.roles.edit', [
            'role' => $role,
            'permissions' => $permissions
        ]);
    }

    public function update(RoleRequest $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:roles,id',
        ], [
            'id.required' => 'El id es requerido',
            'id.exists' => 'El id no existe',
        ]);
        
        $role = Role::find($request->id);
        $role->update($request->all());

        return redirect()->route('roles')->withSuccess('Rol actualizado correctamente');
    }
}
