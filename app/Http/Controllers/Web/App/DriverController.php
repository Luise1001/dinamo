<?php

namespace App\Http\Controllers\Web\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Web\App\DriverRequest;
use App\Models\User;
use App\Models\Role;
use App\Models\Driver;
use Illuminate\Support\Facades\Auth;

class DriverController extends Controller
{
    public function index()
    {
        return view('app.drivers.index');
    }

    public function create()
    {
        $role = Role::where('name', 'user')->first();
        $users = User::where('role_id', $role->id)->select('id', 'email')->orderBy('id', 'desc')->get();

        return view('app.drivers.create', [
            'users' => $users
        ]);
    }

    public function edit(Request $request, $id)
    {
        $request->merge(['id' => $id]);
        
        $this->validate($request, [
            'id' => 'required|exists:drivers,id'
        ],[
            'id.required' => 'El id es requerido',
            'id.exists' => 'El id no existe'
        ]);

        $role = Role::where('name', 'user')->first();
        $driver = Driver::with('responsible')->where('id', $id)->first();
        $users = User::where('role_id', $role->id)->select('id', 'email')->orderBy('id', 'desc')->get();

        return view('app.drivers.edit', [
            'driver' => $driver,
            'users' => $users
        ]);
    }

    public function store(DriverRequest $request)
    {
        $role = Role::where('name', 'driver')->first();
        $user_id = Auth::user()->id;
        $request->merge(['user_id' => $user_id]);

        Driver::create($request->all());
        User::find($request->responsible_id)->update(['role_id' => $role->id]);

        return redirect()->route('drivers');
    }

    public function update(DriverRequest $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:drivers,id',
        ], [
            'id.required' => 'El campo id es requerido',
            'id.exists' => 'El id no existe',
        ]);

        $role_user = Role::where('name', 'user')->first();
        $role = Role::where('name', 'driver')->first();
        $user_id = Auth::user()->id;
        $request->merge(['user_id' => $user_id]);

        $driver = Driver::find($request->id);

        if ($driver->responsible_id != $request->responsible_id) {
            User::find($driver->responsible_id)->update(['role_id' => $role_user->id]);
            User::find($request->responsible_id)->update(['role_id' => $role->id]);
        }

        $driver->update($request->all());

        return redirect()->route('drivers');
    }
}
