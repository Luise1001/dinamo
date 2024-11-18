<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Role;


class UserLivewire extends Component
{
    public $user;
    protected $listeners = ['banned', 'verified', 'admin'];

    public function render()
    {
        return view('livewire.user-livewire');
    }

    public function admin($id)
    {
        $admin = Role::where('name', 'admin')->first();
        $user = User::find($id);
        $user->update(['role_id' => $admin->id]);

        redirect()->route('admin');
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
