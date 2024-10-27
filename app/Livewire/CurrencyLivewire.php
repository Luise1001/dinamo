<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Currency;

class CurrencyLivewire extends Component
{
    public $currencies;
    public $listeners = ['active'];


    public function render()
    {
        $this->currencies = Currency::all();
        
        return view('livewire.currency-livewire');
    }

    public function active($id)
    {
        $currency = Currency::find($id);
        $currency->update(['active' => !$currency->active]);

        $this->currencies = Currency::all();
    }
}
