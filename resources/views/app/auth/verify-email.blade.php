@extends('app.layouts.index')

@section('styles')
@endsection

@section('content')


    <div class="card">
        <div class="card-body">
            <div class="mb-4 text-sm text-gray-600">
                Antes de continuar, ¿podrías verificar tu dirección de correo electrónico haciendo clic en el enlace que acabamos de enviarte? Si no recibiste el correo, con gusto te enviaremos otro.
            </div>
    
            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 text-sm font-medium text-green-600">
                    Se ha enviado un nuevo enlace de verificación a la dirección de correo electrónico que proporcionaste en la configuración de tu perfil.
                </div>
            @endif
    
            <div class="flex items-center justify-between mt-4">
                <form method="POST" action="">
                    @csrf
    
                    <div>
                        <button type="submit" class="btn btn-primary">
                            Reenviar Correo de Verificación
                        </button>
                    </div>
                </form>
    
                <div>
                    <a href="{{ route('profile.show') }}" class="text-sm text-gray-600 underline hover:text-gray-900">
                        Editar Perfil
                    </a>
    
                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
    
                        <button type="submit" class="text-sm text-gray-600 btn-link hover:text-gray-900 ms-2">
                            Cerrar Sesión
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    

@endsection

@section('scripts')
@endsection
