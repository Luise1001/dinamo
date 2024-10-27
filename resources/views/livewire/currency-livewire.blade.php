<div>
    @if (isset($currencies) && $currencies->count() > 0)
        @foreach ($currencies as $currency)
            <a class="p-2 nav-link d-flex justify-content-between" href="{{ route('currencies.edit', ['id' => $currency->id]) }}">
                {{ $currency->name }}

                <label class="container-switch">
                    <input wire:click="active({{ $currency->id }})" type="checkbox" class="toggle-switch"
                        {{ $currency->active == true ? 'checked' : '' }} value="1">
                    <span class="slider"></span>
                </label>
            </a>
        @endforeach
    @endif
</div>
