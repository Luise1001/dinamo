<?php

namespace App\Http\Controllers\Web\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

    public function edit($id)
    {
        return view('app.places.edit');
    }
}
