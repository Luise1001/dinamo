<div class="p-2 m-2 card">
    <div class="mb-4">
        <h2 class="text-primary-color">
            Autenticación en dos pasos
        </h2>
        <p class="text-primary-color">
            Agrega una capa adicional de seguridad a tu cuenta usando la autenticación en dos pasos.
        </p>
    </div>

    <h3 class="text-primary-color">
        @if ($this->enabled)
            @if ($showingConfirmation)
                Habilitando la autenticación en dos pasos
            @else
                Autenticación en dos pasos habilitada
            @endif
        @else
            Autenticación en dos pasos deshabilitada
        @endif
    </h3>

    <div class="max-w-xl mt-3 text-sm text-gray-600">
        <p>
            Cuando la autenticación en dos pasos está habilitada, se te solicitará un token seguro y aleatorio durante
            la autenticación. Puedes obtener este token desde la aplicación Google Authenticator en tu teléfono.
        </p>
    </div>

    @if ($this->enabled)
        @if ($showingQrCode)
            <div class="max-w-xl mt-4 text-sm text-gray-600">
                <p class="font-semibold">
                    @if ($showingConfirmation)
                        Para finalizar la habilitación de la autenticación de dos pasos, escanea el siguiente código QR
                        utilizando la aplicación autenticadora de tu teléfono o ingresa la clave de configuración y
                        proporciona el código OTP generado.
                    @else
                        La autenticación de dos factores está habilitada. Escanea el siguiente código QR utilizando la
                        aplicación autenticadora de tu teléfono o ingresa la clave de configuración.
                    @endif
                </p>
            </div>

            <div class="text-center bg-white">
                {!! $this->user->twoFactorQrCodeSvg() !!}
            </div>

            <div class="max-w-xl mt-4 text-sm text-gray-600">
                <p class="text-primary-color">
                    Clave: {{ decrypt($this->user->two_factor_secret) }}
                </p>
            </div>

            @if ($showingConfirmation)
                <div class="mt-4">
                    <label for="code" class="fw-semibold text-primary-color required">
                        Código
                    </label>
                    <input class="form-control" id="code" type="text" name="code" inputmode="numeric"
                        autofocus autocomplete="one-time-code" wire:model="code"
                        wire:keydown.enter="confirmTwoFactorAuthentication">
                    @error('code')
                        <span class="mt-2 text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            @endif
        @endif

        @if ($showingRecoveryCodes)
            <div class="max-w-xl mt-4 text-sm text-gray-600">
                <p class="font-semibold">
                    Guarda estos códigos de recuperación en un administrador de contraseñas seguro. Pueden usarse para
                    recuperar el acceso a tu cuenta si tu dispositivo de autenticación de dos factores se pierde.
                </p>
            </div>

            <div class="grid max-w-xl gap-1 px-4 py-4 mt-4 font-mono text-sm bg-gray-100 rounded-lg">
                @foreach (json_decode(decrypt($this->user->two_factor_recovery_codes), true) as $code)
                    <div>{{ $code }}</div>
                @endforeach
            </div>
        @endif
    @endif

    <div class="mt-3 text-center">
        @if (!$this->enabled)
            <button class="shadow-sm btn btn-md fw-semibold text-primary-color bg-secondary-light" type="button"
                wire:click="enableTwoFactorAuthentication" wire:loading.attr="disabled">
                Habilitar
            </button>
        @else
            @if ($showingConfirmation)
                <button class="btn btn-md text-primary-color bg-neutral-medium fw-semibold" type="button"
                    wire:click="disableTwoFactorAuthentication" wire:loading.attr="disabled">
                    Cancelar
                </button>
            @else
                <button class="shadow-sm btn btn-md text-primary-color bg-secondary-light fw-semibold" type="button"
                    wire:click="disableTwoFactorAuthentication" wire:loading.attr="disabled">
                    Deshabilitar
                </button>
            @endif

            @if ($showingRecoveryCodes)
                <button class="shadow-sm btn btn-md text-primary-color bg-secondary-light fw-semibold" type="button"
                    wire:click="regenerateRecoveryCodes" wire:loading.attr="disabled">
                    Generar códigos de recuperación
                </button>
            @elseif ($showingConfirmation)
                <button class="shadow-sm btn btn-md text-primary-color bg-secondary-light fw-semibold" type="button"
                    wire:click="confirmTwoFactorAuthentication" wire:loading.attr="disabled">
                    Confirmar
                </button>
            @else
                <button class="shadow-sm btn btn-md text-primary-color bg-secondary-light fw-semibold" type="button"
                    wire:click="showRecoveryCodes" wire:loading.attr="disabled">
                    Mostrar códigos de recuperación
                </button>
            @endif


        @endif
    </div>
</div>
