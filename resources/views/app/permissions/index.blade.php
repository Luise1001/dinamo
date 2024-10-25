@extends('app.layouts.main')

@section('styles')
@endsection

@section('content')
@section('left-button')
    @include('app.layouts.menu.components.back-button')
@endsection
@section('navbar-title')
    PERMISOS
@endsection

@section('right-button')
    @include('app.layouts.menu.components.plus', ['route' => route('permissions.create')])
@endsection

<div class="m-2 card">
    @livewire('permission-livewire')
</div>

@endsection

@section('scripts')
@endsection
