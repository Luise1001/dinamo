<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Driver;

class DriverLivewire extends Component
{
    public $drivers;
    public $listeners = ['active'];

    public function render()
    {
        $this->drivers = Driver::all();

        return view('livewire.driver-livewire');
    }


    public function active($id)
    {
        $driver = Driver::find($id);
        $driver->update(['active' => !$driver->active]);

        $this->drivers = Driver::all();
    }
}
