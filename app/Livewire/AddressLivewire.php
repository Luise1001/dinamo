<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Address;

class AddressLivewire extends Component
{
    public $addresses;
    public $listeners = ['active'];

    public function render()
    {
        $this->addresses = Address::all();

        return view('livewire.address-livewire');
    }

    public function active($id)
    {
        $address = Address::find($id);
        $address->update(['active' => !$address->active]);

        $this->addresses = Address::all();
    }
}
