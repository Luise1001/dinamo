<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class FcmToken extends Component
{
    public $token;
    public $listeners = ['save'];

    public function render()
    {
        return view('livewire.fcm-token');
    }

    public function save($token)
    {
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        $user->update(['fcm_token' => $token]);
    }
}
