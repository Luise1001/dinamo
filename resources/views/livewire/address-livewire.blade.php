<div>
    @if (isset($addresses) && $addresses->count() > 0)
        <div class="p-2 m-2 card">
            @foreach ($addresses as $address)
                <a class="p-2 nav-link d-flex justify-content-between"
                    href="{{ route('address.edit', ['id' => $address->id]) }}">
                    {{ $address->name }}

                    <label class="container-switch">
                        <input wire:click="active({{ $address->id }})" type="checkbox" class="toggle-switch"
                            {{ $address->active == true ? 'checked' : '' }} value="1">
                        <span class="slider"></span>
                    </label>
                </a>
            @endforeach
        </div>
    @endif
</div>
