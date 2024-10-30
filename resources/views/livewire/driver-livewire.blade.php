<div>
    @if (isset($drivers) && $drivers->count() > 0)
        <div class="p-2 m-2 card">
            @foreach ($drivers as $driver)
                <a class="p-2 nav-link d-flex justify-content-between"
                    href="{{ route('drivers.edit', ['id' => $driver->id]) }}">
                    {{ ucfirst($driver->name).' '.ucfirst($driver->last_name) }}

                    <label class="container-switch">
                        <input wire:click="active({{ $driver->id }})" type="checkbox" class="toggle-switch"
                            {{ $driver->active == true ? 'checked' : '' }} value="1">
                        <span class="slider"></span>
                    </label>
                </a>
            @endforeach
        </div>
    @endif
</div>
