@extends('app.layouts.index')

@section('styles')
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="mb-4 text-sm text-gray-600">
            Esta es un área segura de la aplicación. Por favor, confirma tu contraseña antes de continuar.
        </div>

        @if ($errors->any())
            <div class="mb-4">
                <ul class="p-0 list-none">
                    @foreach ($errors->all() as $error)
                        <li class="text-sm text-red-500">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div>
                <label for="password" class="form-label">Contraseña</label>
                <input id="password" class="w-full mt-1 form-control" type="password" name="password" required autocomplete="current-password" autofocus>
            </div>

            <div class="flex justify-end mt-4">
                <button type="submit" class="btn btn-primary ms-4">
                    Confirmar
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
    
@endsection