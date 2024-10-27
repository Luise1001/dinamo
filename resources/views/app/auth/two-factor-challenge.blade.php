@extends('app.layouts.index')

@section('styles')
@endsection

@section('content')
    <div class="pt-5">
        <div class="p-2 m-2 card">
            <div x-data="{ recovery: false }">
                <div class="mb-4 text-sm text-gray-600" x-show="! recovery">
                    Por favor confirma el acceso a tu cuenta ingresando el código de autenticación proporcionado por tu
                    aplicación autenticadora.
                </div>

                <div class="mb-4 text-sm text-gray-600" x-cloak x-show="recovery">
                    Por favor confirma el acceso a tu cuenta ingresando uno de tus códigos de recuperación de emergencia.
                </div>

                <form method="POST" action="{{ route('two-factor.login') }}">
                    @csrf

                    <div class="mt-4" x-show="! recovery">
                        <label for="code" class="fw-semibold required text-dark-green">Código</label>
                        <input id="code" class="form-control" type="text" inputmode="numeric" name="code"
                            autofocus x-ref="code" placeholder="Código">
                    </div>

                    <div class="mt-4" x-cloak x-show="recovery">
                        <label for="recovery_code" class="fw-semibold required text-dark-green">Código de recuperación</label>
                        <input id="recovery_code" class="form-control" type="text" name="recovery_code"
                            x-ref="recovery_code" placeholder="Código de recuperación">
                    </div>

                    <div class="pb-3 mt-3 text-center d-flex">
                        <button type="button" class="shadow-sm btn btn-md bg-light-gray text-dark-green me-2 fw-semibold" x-show="! recovery"
                            x-on:click="
                                recovery = true;
                                $nextTick(() => { $refs.recovery_code.focus() })
                            ">
                            Código de recuperación
                        </button>

                        <button type="button" class="shadow-sm btn btn-md bg-light-gray text-dark-green me-2 fw-semibold" x-cloak x-show="recovery"
                            x-on:click="
                                recovery = false;
                                $nextTick(() => { $refs.code.focus() })
                            ">
                            Código de autenticación
                        </button>

                        <button type="submit" class="shadow-sm btn btn-md bg-light-blue text-dark-green fw-semibold">
                            Iniciar Sesión
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

@section('scripts')
@endsection
