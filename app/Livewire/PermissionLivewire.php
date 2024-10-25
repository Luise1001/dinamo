<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Permission;

class PermissionLivewire extends Component
{
    public $permissions;
    public $listeners = ['active'];

    public function render()
    {
        $this->permissions = Permission::all();

        return view('livewire.permission-livewire');
    }

    public function active($id)
    {
        $permission = Permission::find($id);
        $permission->update([
            'active' => !$permission->active
        ]);

        $this->permissions = Permission::all();
    }
}
