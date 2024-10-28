@extends('app.layouts.main')

@section('styles')
@endsection

@section('content')
@section('left-button')
    @include('app.layouts.menu.components.back-button')
@endsection
@section('navbar-title')
    DESTINOS
@endsection

@section('right-button')
    @include('app.layouts.menu.components.plus', ['route' => route('places.create')])
@endsection

@livewire('place-livewire')

@endsection

@section('scripts')
@endsection
