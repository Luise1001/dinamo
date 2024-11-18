@extends('app.layouts.main')

@section('styles')
@endsection

@section('content')
@section('left-button')
    @include('app.layouts.menu.components.back-button')
@endsection
@section('navbar-title')
    CONDUCTORES
@endsection

@section('right-button')
    @include('app.layouts.menu.components.plus', ['route' => route('drivers.create')])
@endsection

@livewire('driver-livewire')

@endsection

@section('scripts')
@endsection
