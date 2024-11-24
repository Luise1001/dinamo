<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Location;
use Illuminate\Support\Facades\Auth;

class LocationLivewire extends Component
{
    public $location;
    public $listeners = ['saveLocation'];

    public function render()
    {
        return view('livewire.location-livewire');
    }

    public function saveLocation($location)
    {
        $user_id = Auth::user()->id;
        Location::updateOrCreate([
            'user_id' => $user_id,
        ],[
            'lat' => $location['latitude'],
            'lng' => $location['longitude'],
            'user_id' => $user_id,
        ]);
    }
}
