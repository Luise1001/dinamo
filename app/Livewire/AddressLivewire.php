<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;

class AddressLivewire extends Component
{
    public $addresses;
    public $listeners = ['active'];

    public function render()
    {
        $user_id = Auth::user()->id;
        $this->addresses = Address::where('user_id', $user_id)->get();

        return view('livewire.address-livewire');
    }

    public function active($id)
    {
        $address = Address::find($id);
        $address->update(['active' => !$address->active]);

        $this->addresses = Address::all();
    }
}
