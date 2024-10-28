@extends('app.layouts.main')

@section('styles')
@endsection

@section('content')
@section('left-button')
    @include('app.layouts.menu.components.back-button')
@endsection
@section('navbar-title')
    EDITAR DESTINO
@endsection

<div class="p-2 m-2 card">
    <div>
        <label for="name" class="fw-semibold text-primary-color required">Nombre</label>
        <input class="form-control" id="name" name="name" type="text" placeholder="Nombre">
    </div>

    <div class="mt-1">
        <label for="autocomplete" class="fw-semibold text-primary-color required">Dirección</label>
        <input class="form-control" id="autocomplete" name="autocomplete" type="text" placeholder="Buscar dirección">
        <span id="error" class="text-danger"></span>
    </div>

    <div style="width=300px; height: 300px" class="mt-3 card">
        <div id="map" style="height: 100%; width: 100%;"></div>
    </div>

    <div class="mt-4 text-center">
        <button class="shadow-sm btn bg-secondary-light text-primary-color fw-semibold fs-6">Guardar</button>
    </div>
</div>

@endsection

@section('scripts')
<script>
    const key = '{{ env('GOOGLE_MAPS_API_KEY') }}';
</script>
<script type="module" src="{{ asset('assets/js/app/utilities/maps.js') }}"></script>
@endsection
