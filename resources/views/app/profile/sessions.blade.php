@extends('app.layouts.main')

@section('styles')
@endsection

@section('content')
@section('left-button')
    @include('app.layouts.menu.components.back-button')
@endsection
@section('navbar-title')
    CONTROL DE SESIONES
@endsection


@livewire('profile.logout-other-browser-sessions-form')


@endsection

@section('scripts')
@endsection
