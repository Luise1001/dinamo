@extends('app.layouts.index')

@section('styles')
@endsection

@section('content')
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="w-100 d-grid">
            <div class="text-center">
                <img src="{{ asset('assets/media/icons/logo.svg') }}" alt="Logo">
                <h1 class="text-dark-green fw-bold">DINAMO</h1>
                <h6 class="text-dark-green">Registrarme</h6>
            </div>

            <div class="p-2">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div>
                        <label for="name" class="fw-semibold text-dark-green required">Nombre</label>
                        <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}"
                            required placeholder="Nombre">
                    </div>

                    <div class="mt-1">
                        <label for="email" class="fw-semibold text-dark-green required">Correo electrónico
                        </label>
                        <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}"
                            required placeholder="Correo electrónico">
                    </div>

                    <div class="mt-1">
                        <label for="password" class="fw-semibold text-dark-green required">Contraseña</label>
                        <input id="password" class="form-control" type="password" name="password" required
                            placeholder="Contraseña">
                    </div>

                    <div class="mt-1">
                        <label for="password_confirmation" class="fw-semibold text-dark-green required">Confirmar contraseña</label>
                        <input id="password_confirmation" class="form-control" type="password" name="password_confirmation"
                            required placeholder="Confrimar contraseña">
                    </div>

                    <div class="mt-3 text-center">
                        <button type="submit" class="shadow-sm btn btn-md bg-light-blue text-dark-green fw-semibold w-100">
                            Registrarme
                        </button>

                        <button onclick="window.history.back()" class="mt-3 text-white shadow-sm btn btn-md bg-light-gray">
                            Volver
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
@endsection
