<?php

namespace App\Http\Controllers\Web\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Web\App\PlaceRequest;
use App\Models\Place;
use Illuminate\Support\Facades\Auth;

class PlacesController extends Controller
{
    public function index()
    {
        return view('app.places.index');
    }

    public function create()
    {
        return view('app.places.create');
    }

    public function edit(Request $request, $id)
    {
        $request->merge(['id' => $id]);
        
        $this->validate($request, [
            'id' => 'required|exists:places,id'
        ],[
            'id.required' => 'El id es requerido',
            'id.exists' => 'El id no existe'
        ]);

        $place = Place::find($id);

        return view('app.places.edit', [
            'place' => $place
        ]);
    }

    public function store(PlaceRequest $request)
    {
        $user_id = Auth::user()->id;
        $request->merge(['user_id' => $user_id]);
        Place::create($request->all());

        return redirect()->route('places')->withSuccess('Destino creado correctamente');
    }

    public function update(PlaceRequest $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:places,id'
        ], [
            'id.required' => 'El destino es requerido',
            'id.exists' => 'El destino no existe',
        ]);

        $place = Place::find($request->id);
        $place->update($request->all());

        return redirect()->route('places')->withSuccess('Destino actualizado correctamente');
    }
}
