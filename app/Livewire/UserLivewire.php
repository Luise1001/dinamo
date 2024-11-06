<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;


class UserLivewire extends Component
{
    public $user;
    protected $listeners = ['banned', 'verified'];

    public function render()
    {
        return view('livewire.user-livewire');
    }

    public function banned($id)
    {
        $user = User::find($id);
        $user->update(['banned' => !$user->banned]);
        $this->user = $user;
    }

    public function verified($id)
    {
        $user = User::find($id);
        $user->update(['verified' => !$user->verified]);
        $this->user = $user;
    }
}
