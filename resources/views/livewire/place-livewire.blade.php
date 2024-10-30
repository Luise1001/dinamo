<div>
    @if (isset($places) && $places->count() > 0)
        <div class="p-2 m-2 card">
            @foreach ($places as $place)
                <a class="p-2 nav-link d-flex justify-content-between"
                    href="{{ route('places.edit', ['id' => $place->id]) }}">
                    {{ $place->name }}

                    <label class="container-switch">
                        <input wire:click="active({{ $place->id }})" type="checkbox" class="toggle-switch"
                            {{ $place->active == true ? 'checked' : '' }} value="1">
                        <span class="slider"></span>
                    </label>
                </a>
            @endforeach
        </div>
    @endif
</div>
