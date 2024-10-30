@extends('app.layouts.index')

@section('styles')
@endsection

@section('content')
 
    <div class="card">
        <div class="card-body">
            @if ($errors->any())
                <div class="mb-4">
                    <ul class="p-0 list-none">
                        @foreach ($errors->all() as $error)
                            <li class="text-sm text-red-500">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
    
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
    
                <input type="hidden" name="token" value="">
    
                <div class="block">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input id="email" class="w-full mt-1 form-control" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                </div>
    
                <div class="mt-4">
                    <label for="password" class="form-label">Contraseña</label>
                    <input id="password" class="w-full mt-1 form-control" type="password" name="password" required autocomplete="new-password">
                </div>
    
                <div class="mt-4">
                    <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                    <input id="password_confirmation" class="w-full mt-1 form-control" type="password" name="password_confirmation" required autocomplete="new-password">
                </div>
    
                <div class="flex items-center justify-end mt-4">
                    <button type="submit" class="btn btn-primary">
                        Restablecer Contraseña
                    </button>
                </div>
            </form>
        </div>
    </div>
    
    

@endsection

@section('scripts')
@endsection
