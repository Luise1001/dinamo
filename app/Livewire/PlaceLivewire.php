<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Place;

class PlaceLivewire extends Component
{
    public $places; 
    public $listeners = ['active'];

    public function render()
    {
        $this->places = Place::all();
        
        return view('livewire.place-livewire');
    }

    public function active($id)
    {
        $place = Place::find($id);
        $place->update(['active' => !$place->active]);

        $this->places = Place::all();
    }
}
