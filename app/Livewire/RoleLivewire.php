<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Role;

class RoleLivewire extends Component
{
    public $roles;
    public $listeners = ['active'];

    public function render()
    {
        $this->roles = Role::with('permissions')->get();

        return view('livewire.role-livewire');
    }

    public function active($id)
    {
        $role = Role::find($id);
        $role->update(['active' => !$role->active]);

        $this->roles = Role::with('permissions')->get();
    }
}
