@extends('app.layouts.main')

@section('styles')
@endsection

@section('content')
@section('left-button')
    @include('app.layouts.menu.components.back-button')
@endsection
@section('navbar-title')
    DETALLE DE ENTREGA
@endsection

@section('right-button')
@endsection

<div class="m-2 card">
    <div class="p-2">
        <div class="d-flex">
            <span class="fw-semibold me-2">Usuario:</span>
            <span>{{ $delivery->user->name }}</span>
        </div>
        <div class="d-flex">
            <span class="fw-semibold me-2">Orden:</span>
            <span>{{ $delivery->id }}</span>
        </div>
        <div class="d-flex">
            <span class="fw-semibold me-2">Moneda:</span>
            <span>{{ $delivery->currency->code }}</span>
        </div>
        <div class="d-flex">
            <span class="fw-semibold me-2">Monto:</span>
            <span>{{ number_format($delivery->amount, 2, ',', '.') }}</span>
        </div>
        <div class="d-flex">
            <span class="fw-semibold me-2">Dirección:</span>
            <span>{{ $delivery->address->address }}</span>
        </div>
        <div class="d-flex">
            <span class="fw-semibold me-2">Destino:</span>
            <span>{{ $delivery->place->address }}</span>
        </div>
        <div class="d-flex">
            <span class="fw-semibold me-2">Conductor:</span>
            <span>{{ $delivery->driver->name ?? 'Sin asignar' }}</span>
        </div>
        <div class="mt-1 mb-1 progress" role="progressbar" aria-label="" aria-valuenow="{{ $delivery->progress }}"
            aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar" style="width: {{ $delivery->progress }}%"></div>
        </div>
    </div>
</div>


@endsection

@section('scripts')
@endsection
