@extends('app.layouts.main')

@section('styles')
@endsection

@section('content')
@section('left-button')
    @include('app.layouts.menu.components.back-button')
@endsection
@section('navbar-title')
    PERFIL
@endsection

<div class="m-2 card">
    <a class="p-2 nav-link d-flex justify-content-between" href="{{ route('profile.info') }} ">
       Información personal	

        <span class="px-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24">
                <path fill="#999999" d="M8.025 22L6.25 20.225L14.475 12L6.25 3.775L8.025 2l10 10z" />
            </svg>
        </span>
    </a>
    <a class="p-2 nav-link d-flex justify-content-between" href="{{ route('profile.password') }}  ">
       Cambiar contraseña

        <span class="px-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24">
                <path fill="#999999" d="M8.025 22L6.25 20.225L14.475 12L6.25 3.775L8.025 2l10 10z" />
            </svg>
        </span>
    </a>
    <a class="p-2 nav-link d-flex justify-content-between" href="{{ route('profile.security') }}  ">
       Seguridad

        <span class="px-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24">
                <path fill="#999999" d="M8.025 22L6.25 20.225L14.475 12L6.25 3.775L8.025 2l10 10z" />
            </svg>
        </span>
    </a>
    <a class="p-2 nav-link d-flex justify-content-between" href="{{ route('profile.sessions') }}  ">
       Control de sesiones

        <span class="px-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24">
                <path fill="#999999" d="M8.025 22L6.25 20.225L14.475 12L6.25 3.775L8.025 2l10 10z" />
            </svg>
        </span>
    </a>
    <a class="p-2 nav-link d-flex justify-content-between" href="{{ route('profile.deleteAccount') }}  ">
       Eliminar cuenta

        <span class="px-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24">
                <path fill="#999999" d="M8.025 22L6.25 20.225L14.475 12L6.25 3.775L8.025 2l10 10z" />
            </svg>
        </span>
    </a>
</div>


@endsection

@section('scripts')
@endsection
