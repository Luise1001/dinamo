@extends('app.layouts.index')

@section('styles')
@endsection

@section('content')
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="d-grid w-100">
            <div class="text-center">
                <img src="{{ asset('assets/media/icons/logo.svg') }}" alt="Logo">
                <h1 class="text-dark-green fw-bold">DINAMO</h1>
                <h6 class="text-dark-green">Iniciar sesión</h6>
            </div>
            
            <div class="p-2">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div>
                        <label for="email" class="fw-semibold text-dark-green required">Correo
                            electrónico</label>
                        <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}"
                            required placeholder="Correo electrónico">
                    </div>

                    <div class="mt-1">
                        <label for="password" class="fw-semibold text-dark-green required">Contraseña</label>
                        <input id="password" class="form-control" type="password" name="password" required
                            placeholder="Contraseña">
                    </div>

                    <div class="mt-3 text-center">
                        <button type="submit" class="shadow-sm text-dark-green btn btn-mid w-100 bg-light-blue fw-semibold fs-6">
                            Iniciar sesión
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
