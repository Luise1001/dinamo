<?php

namespace App\Http\Controllers\Web\App;

use Illuminate\Http\Request;
use App\Http\Requests\Web\App\PermissionRequest;
use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;

class PermissionController extends Controller
{
    public function index()
    {
        return view('app.permissions.index');
    }

    public function create()
    {
        return view('app.permissions.create');
    }

    public function store(PermissionRequest $request)
    {
        $dev = Role::where('name', 'developer')->first();
        $permission = Permission::create($request->all());

        $dev->permissions()->attach($permission->id);

        return redirect()->route('permissions')->withSuccess('Permiso creado correctamente');
    }

    public function edit(Request $request, $id)
    {
        $this->validate($request, [
            'id' => 'required|exists:permissions,id'
        ],[
            'id.required' => 'El id es requerido',
            'id.exists' => 'El id no existe'
        ]);

        $permission = Permission::find($id);

        return view('app.permissions.edit', [
            'permission' => $permission
        ]);
    }

    public function update(PermissionRequest $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:permissions,id',
        ], [
            'id.required' => 'El id es requerido',
            'id.exists' => 'El id no existe',
        ]);

        if (!$request->hidden) {
            $request->merge(['hidden' => false]);
        }

        $permission = Permission::find($request->id);
        $permission->update($request->all());

        return redirect()->route('permissions')->withSuccess('Permiso actualizado correctamente');
    }
}
