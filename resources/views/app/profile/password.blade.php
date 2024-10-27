@extends('app.layouts.main')

@section('styles')
@endsection

@section('content')
@section('left-button')
    @include('app.layouts.menu.components.back-button')
@endsection
@section('navbar-title')
    CAMBIAR CONTRASEÑA
@endsection


@if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
    @livewire('profile.update-password-form')
@endif


@endsection

@section('scripts')
@endsection
