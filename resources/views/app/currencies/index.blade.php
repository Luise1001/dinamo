@extends('app.layouts.main')

@section('styles')
@endsection

@section('content')
@section('left-button')
    @include('app.layouts.menu.components.back-button')
@endsection
@section('navbar-title')
    MONEDAS
@endsection

@section('right-button')
    @include('app.layouts.menu.components.plus', ['route' => route('currencies.create')])
@endsection

@livewire('currency-livewire')


@endsection

@section('scripts')
@endsection
