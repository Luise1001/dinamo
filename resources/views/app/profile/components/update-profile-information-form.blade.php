<div class="p-2 m-2 card">
    <form wire:submit.prevent="updateProfileInformation">

        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{ photoName: null, photoPreview: null }" class="p-3 mb-2 text-center">
                <input type="file" id="photo" class="d-none" wire:model.live="photo" x-ref="photo"
                    x-on:change="
                    photoName = $refs.photo.files[0].name;
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        photoPreview = e.target.result;
                    };
                    reader.readAsDataURL($refs.photo.files[0]);
                " />

                <div class="mt-2" x-show="!photoPreview" x-on:click.prevent="$refs.photo.click()"
                    style="cursor: pointer;">
                    <img style="border-radius: 100%;" src="{{ $this->user->profile_photo_url }}"
                        alt="{{ $this->user->name }}" class=" h-50 w-50">
                </div>

                <div class="mt-2" x-show="photoPreview" x-on:click.prevent="$refs.photo.click()"
                    style="cursor: pointer;">
                    <img style="border-radius: 100%;" :src="photoPreview" alt="New Profile Preview"
                        class="rounded-full w-50 h-50">
                </div>

                @if ($this->user->profile_photo_path)
                    <a type="button" wire:click="deleteProfilePhoto" class="mt-3 nav-link text-primary-color">
                        Remover foto
                    </a>
                @endif

                @error('photo')
                    <span class="mt-2 text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>
        @endif


        <div>
            <label for="name" class="text-primary-color fw-semibold required">Nombre </label>
            <input class="form-control " id="name" type="text" wire:model="state.name" required placeholder="Nombre">
            @error('name')
                <span class="mt-2 text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="mt-1">
            <label for="email" class="fw-semibold text-primary-color required">Correo electrónico</label>
            <input class="form-control" id="email" type="email" wire:model="state.email" required placeholder="Correo electrónico">
            @error('email')
                <span class="mt-2 text-sm text-red-500">{{ $message }}</span>
            @enderror

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) &&
                    !$this->user->hasVerifiedEmail())
                <p class="mt-2 text-sm">
                    {{ __('Your email address is unverified.') }}
                    <button type="button"
                        class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        wire:click.prevent="sendEmailVerification">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if ($this->verificationLinkSent)
                    <p class="mt-2 text-sm font-medium text-green-600">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            @endif
        </div>

        <div class="mt-3 text-center">

            <button class="shadow-sm btn btn-md bg-secondary-light text-primary-color fw-semibold" type="submit" wire:loading.attr="disabled" wire:target="photo">
                Guardar
            </button>
        </div>
    </form>
</div>
