@extends('app.layouts.main')

@section('styles')
@endsection

@section('content')
@section('left-button')
    @include('app.layouts.menu.components.back-button')
@endsection
@section('navbar-title')
    ENTREGAS
@endsection

@section('right-button')
    @include('app.layouts.menu.components.plus', ['route' => route('delivery.create')])
@endsection

@include('app.delivery.components.list')

@endsection

@section('scripts')
@endsection
