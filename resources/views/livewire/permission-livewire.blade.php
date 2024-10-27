<div>
    @if (isset($permissions) && $permissions->count() > 0)
    @foreach ($permissions as $permission)
        <a class="p-2 nav-link d-flex justify-content-between" href="{{ route('permissions.edit', ['id' => $permission->id]) }}">
            {{ $permission->display_name }}

            <label class="container-switch">
                <input wire:click="active({{ $permission->id }})" type="checkbox" class="toggle-switch" {{ $permission->active == true ? 'checked' : '' }}>
                <span class="slider"></span>
            </label>
        </a>
    @endforeach
@endif
</div>
