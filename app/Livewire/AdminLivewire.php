<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Role;

class AdminLivewire extends Component
{
    public $user;
    protected $listeners = ['banned', 'verified', 'admin'];

    public function render()
    {
        return view('livewire.admin-livewire');
    }

    public function admin($id)
    {
        $role = Role::where('name', 'user')->first();
        $user = User::find($id);
        $user->update(['role_id' => $role->id]);

        redirect()->route('users');
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
