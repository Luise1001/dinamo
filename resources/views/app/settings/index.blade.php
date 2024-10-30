@extends('app.layouts.main')

@section('styles')
@endsection

@section('content')
@section('left-button')
    @include('app.layouts.menu.components.back-button')
@endsection
@section('navbar-title')
    CONFIGURACIÓN
@endsection

<div class="m-2 card">
    @if (isset($permissions) && $permissions->count() > 1)
        @foreach ($permissions as $permission)
            <a class="p-2 nav-link d-flex justify-content-between" href="{{ route($permission->route) }} ">
                {{ $permission->display_name }}

                <span class="px-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24">
                        <path fill="#999999" d="M8.025 22L6.25 20.225L14.475 12L6.25 3.775L8.025 2l10 10z" />
                    </svg>
                </span>
            </a>
        @endforeach
    @endif

    <form action="{{ route('logout') }} " method="post">
        @csrf
        <div class="p-2 d-flex justify-content-between">
            <button class="nav-link">
                Cerrar sesión
            </button>

            <span class="px-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24">
                    <path fill="#999999" d="M8.025 22L6.25 20.225L14.475 12L6.25 3.775L8.025 2l10 10z" />
                </svg>
            </span>
        </div>
    </form>
</div>

@endsection

@section('scripts')
@endsection
