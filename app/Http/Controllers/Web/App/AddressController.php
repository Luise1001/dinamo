<?php

namespace App\Http\Controllers\Web\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Web\App\AddressRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Address;

class AddressController extends Controller
{
    public function index()
    {
        return view('app.address.index');
    }

    public function create()
    {
        return view('app.address.create');
    }

    public function store(AddressRequest $request)
    {
        $user_id = Auth::user()->id;
        $request->merge(['user_id' => $user_id]);

        Address::create($request->all());

        return redirect()->route('address')->withSuccess('Dirección creada correctamente.');
    }

    public function edit(request $request, $id)
    {
        $request->merge(['id' => $id]);
        
        $this->validate($request, [
            'id' => 'required|exists:addresses,id'
        ],[
            'id.required' => 'El id es requerido',
            'id.exists' => 'El id no existe'
        ]);

        $address = Address::find($id);

        return view('app.address.edit', [
            'address' => $address
        ]);
    }

    public function update(AddressRequest $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:addresses,id'
        ],[
            'id.required' => 'El id es requerido',
            'id.exists' => 'El id no existe'
        ]);

        $address = Address::find($request->id);
        $address->update($request->all());

        return redirect()->route('address')->withSuccess('Dirección actualizada correctamente.');
    }
}
