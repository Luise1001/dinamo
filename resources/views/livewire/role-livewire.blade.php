<div>
    @if (isset($roles) && $roles->count() > 0)
        @foreach ($roles as $role)
            <a class="p-2 nav-link d-flex justify-content-between" href="{{ route('roles.edit', ['id' => $role->id]) }}">
                {{ $role->display_name }}

                <label class="container-switch">
                    <input wire:click="active({{ $role->id }})" type="checkbox" class="toggle-switch"
                        {{ $role->active == true ? 'checked' : '' }} value="1">
                    <span class="slider"></span>
                </label>
            </a>
        @endforeach
    @endif
</div>
