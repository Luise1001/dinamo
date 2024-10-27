@extends('app.layouts.index')

@section('styles')
@endsection

@section('content')
    <div class="pt-5">
        <div class="p-2 m-2 card">
            <div class="mb-4 text-sm text-gray-600">
                ¿Olvidaste tu contraseña? No hay problema. Simplemente indícanos tu dirección de correo electrónico y te
                enviaremos un enlace para restablecer tu contraseña que te permitirá elegir una nueva.
            </div>

            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="block">
                    <label for="email" class="fw-semibold required text-dark-green">Correo Electrónico</label>
                    <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}"
                        required autofocus placeholder="Correo electrónico">
                </div>

                <div class="mt-4 text-center">
                    <button type="submit" class="btn btn-md text-dark-green fw-semibold bg-light-blue">
                        Enviar
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
