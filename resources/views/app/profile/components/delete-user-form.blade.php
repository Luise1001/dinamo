<div class="p-2 m-2 card">
    <div class="mb-2">
        <h6 class="text-md text-dark-green">
            Eliminación de la cuenta permanentemente.
        </h6>
    </div>

    <div class="text-sm text-dark-green">
        Una vez que tu cuenta sea eliminada, todos sus recursos y datos se eliminarán permanentemente. Antes de eliminar tu cuenta, por favor descarga cualquier dato o información que desees conservar.
    </div>

    <div class="mt-5 text-center">
        <button class="btn btn-sm fw-semibold text-dark-green bg-light-blue" wire:click="confirmUserDeletion" wire:loading.attr="disabled">
            Eliiminar cuenta
        </button>
    </div>

    <div x-data="{ open: @entangle('confirmingUserDeletion') }">
        <div x-show="open" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-800 bg-opacity-75">
            <div class="p-2">
                <h3 class="text-lg font-medium text-danger">Eliminar cuenta</h3>
                <p class="text-sm text-danger">
                    ¿Estás seguro de que deseas eliminar tu cuenta? Una vez que tu cuenta sea eliminada, todos sus recursos y datos se eliminarán permanentemente. Por favor, ingresa tu contraseña para confirmar que deseas eliminar tu cuenta de forma permanente.
                </p>

                <div class="mt-4">
                    <label for="password" class="fw-semibold required text-dark-green">Contraseña</label>
                    <input type="password" class="form-control"
                           autocomplete="current-password"
                           placeholder="Contraseña"
                           x-ref="password"
                           wire:model="password"
                           wire:keydown.enter="deleteUser">
                    @error('password') <span class="mt-2 text-sm text-red-500">{{ $message }}</span> @enderror
                </div>

                <div class="mt-4 text-center">
                    <button class="btn btn-md bg-light-gray fw-semibold text-dark-green" wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
                        Cancelar
                    </button>
                    <button class="text-white btn btn-md bg-danger" wire:click="deleteUser" wire:loading.attr="disabled">
                        Confirmar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
