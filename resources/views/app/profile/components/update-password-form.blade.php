<div class="p-2 m-2 card">
    <form wire:submit.prevent="updatePassword">

        <div>
            <label for="current_password" class="fw-semibold text-dark-green required">
                Contraseña actual
            </label>
            <input class="form-control" id="current_password" type="password" wire:model="state.current_password"
                placeholder="Contraseña actual">
            @error('current_password')
                <span class="mt-2 text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="mt-1">
            <label for="password" class="fw-semibold text-dark-green required">
                Contraseña nueva
            </label>
            <input class="form-control" id="password" type="password" wire:model="state.password"
                placeholder="Contraseña nueva">
            @error('password')
                <span class="mt-2 text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="mt-1">
            <label for="password_confirmation" class="fw-semibold text-dark-green required">
                Confirmar contraseña
            </label>
            <input class="form-control" id="password_confirmation" type="password"
                wire:model="state.password_confirmation" placeholder="Confirmar contraseña">
            @error('password_confirmation')
                <span class="mt-2 text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="mt-3 text-center">
            <button wire:loading.class="opacity-50" type="submit" class="shadow-sm btn btn-md fw-bold text-dark-green bg-light-blue">
                Guardar
            </button>
        </div>
    </form>

</div>
