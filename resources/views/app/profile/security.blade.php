@extends('app.layouts.main')

@section('styles')
@endsection

@section('content')
@section('left-button')
    @include('app.layouts.menu.components.back-button')
@endsection
@section('navbar-title')
    SEGURIDAD
@endsection


@if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
    @livewire('profile.two-factor-authentication-form')
@endif


@endsection

@section('scripts')
@endsection
