<div class="p-2 m-2 card">
    <div class="mb-2">
        <p class="text-primary-color">
            Controla y cierra las sesiones de tu cuenta en otros dispositivos y navegadores.
        </p>
    </div>

    <div class="max-w-xl text-sm text-gray-600">
        Si es necesario, puedes cerrar la sesión de todas tus demás sesiones de navegador en todos tus dispositivos. Algunas de tus sesiones recientes se enumeran a continuación; sin embargo, esta lista puede no ser exhaustiva. Si sientes que tu cuenta ha sido comprometida, también deberías actualizar tu contraseña.
    </div>

    @if (count($this->sessions) > 0)
        <div class="mt-5 space-y-6">
            @foreach ($this->sessions as $session)
                <div class="flex items-center">
                    <div>
                        @if ($session->agent->isDesktop())
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="text-gray-500 w-25 h-25">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25" />
                            </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="text-gray-500 w-25 h-25">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                            </svg>
                        @endif
                    </div>

                    <div class="ms-3">
                        <div class="text-sm text-gray-600">
                            {{ $session->agent->platform() ? $session->agent->platform() : __('Unknown') }} - {{ $session->agent->browser() ? $session->agent->browser() : __('Unknown') }}
                        </div>

                        <div>
                            <div class="text-xs text-gray-500">
                                {{ $session->ip_address }}:

                                @if ($session->is_current_device)
                                    <span class="font-semibold text-green-500"> Este dispositivo</span>
                                @else
                                    Ultima vez:  {{ $session->last_active }}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <div class="mt-5 text-center">
        <button class="shadow-sm btn btn-sm fw-semibold text-primary-color bg-secondary-light" wire:click="confirmLogout" wire:loading.attr="disabled">
            Cerrar sesión
        </button>
    </div>

    <div class="mt-3" x-data="{ open: @entangle('confirmingLogout') }">
        <div x-show="open" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-800 bg-opacity-75">
            <div class="">
                <h3 class="text-lg font-medium">Cerrar sesión en todos los dispositivos.</h3>
                <p class="text-sm text-gray-600">
                    Por favor, ingresa tu contraseña para confirmar que deseas cerrar tus otras sesiones en todos tus dispositivos.
                </p>

                <div class="mt-4">
                    <label for="password" class="fw-semibold text-primary-color required">Contraseña</label>
                    <input type="password" class="form-control" autocomplete="current-password" placeholder="Contraseña"
                        wire:model="password" wire:keydown.enter="logoutOtherBrowserSessions">
                    @error('password') <span class="mt-2 text-sm text-red-500">{{ $message }}</span> @enderror
                </div>

                <div class="mt-4 text-center">
                    <button class="shadow-sm btn btn-md fw-semibold text-primary-color bg-neutral-medium" wire:click="$toggle('confirmingLogout')" wire:loading.attr="disabled">
                        Cancelar
                    </button>
                    <button class="shadow-sm btn btn-md fw-semibold text-primary-color bg-secondary-light" wire:click="logoutOtherBrowserSessions" wire:loading.attr="disabled">
                       Confirmar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
