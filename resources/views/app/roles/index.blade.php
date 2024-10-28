@extends('app.layouts.main')

@section('styles')
@endsection

@section('content')
@section('left-button')
    @include('app.layouts.menu.components.back-button')
@endsection
@section('navbar-title')
    ROLES
@endsection

@section('right-button')
    @include('app.layouts.menu.components.plus', ['route' => route('roles.create')])
@endsection

@livewire('role-livewire')

@endsection

@section('scripts')
@endsection
