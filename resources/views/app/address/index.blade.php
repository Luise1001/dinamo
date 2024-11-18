@extends('app.layouts.main')

@section('styles')
@endsection

@section('content')
@section('left-button')
    @include('app.layouts.menu.components.back-button')
@endsection
@section('navbar-title')
    MIS DIRECCIONES
@endsection

@section('right-button')
    @include('app.layouts.menu.components.plus', ['route' => route('address.create')])
@endsection

@livewire('address-livewire')

@endsection

@section('scripts')
@endsection
