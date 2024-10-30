@extends('app.layouts.main')

@section('styles')
@endsection

@section('content')
@section('left-button')
    @include('app.layouts.menu.components.back-button')
@endsection
@section('navbar-title')
   Eliminar cuenta
@endsection


@if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
    @livewire('profile.delete-user-form')
@endif


@endsection

@section('scripts')
@endsection
