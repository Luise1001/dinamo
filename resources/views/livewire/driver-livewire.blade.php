<div>
    @if (isset($drivers) && $drivers->count() > 0)
        <div class="p-2 m-2 card">
            @foreach ($drivers as $driver)
                <a class="p-2 nav-link d-flex justify-content-between"
                    href="{{ route('drivers.edit', ['id' => $driver->id]) }}">

                    <div class="d-flex">
                        <div x-data="{ photoName: null, photoPreview: null }" class="text-center">
                            <div class="mt-2" x-show="!photoPreview" x-on:click.prevent="$refs.photo.click()"
                                style="cursor: pointer;">
                                <img style="border-radius: 100%;" src="{{ $driver->responsible->profile_photo_url }}"
                                    alt="{{ $driver->name }}" class=" h-75 w-75">
                            </div>

                            <div class="mt-2" x-show="photoPreview" x-on:click.prevent="$refs.photo.click()"
                                style="cursor: pointer;">
                                <img style="border-radius: 100%;" :src="photoPreview" alt="New Profile Preview"
                                    class="rounded-full w-50 h-50">
                            </div>

                            @error('photo')
                                <span class="mt-2 text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        {{ ucfirst($driver->name) . ' ' . ucfirst($driver->last_name) }}
                    </div>

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
