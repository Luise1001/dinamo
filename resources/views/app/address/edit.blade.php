@extends('app.layouts.main')

@section('styles')
@endsection

@section('content')
@section('left-button')
    @include('app.layouts.menu.components.back-button')
@endsection
@section('navbar-title')
    EDITAR DIRECCIÓN
@endsection

@if (isset($address))
    <div class="p-2 m-2 card">
        <form action="{{ route('address.update') }}" method="post">
            @csrf
            @method('PUT')
            <div>
                <input type="hidden" name="id" value="{{ $address->id }}">
                <label for="name" class="fw-semibold text-primary-color required">Nombre</label>
                <input class="form-control" id="name" name="name" type="text" placeholder="Nombre" value="{{ $address->name }}">
            </div>

            <div class="mt-1">
                <label for="adress" class="fw-semibold text-primary-color required">Dirección</label>
                <input class="form-control" id="address" name="address" type="text" placeholder="Buscar dirección" value="{{ $address->address }}">
                <span id="error" class="text-danger"></span>
            </div>

            <div>
                <input type="hidden" id="lat" name="lat" value="{{ $address->lat }}">
                <input type="hidden" id="lng" name="lng" value="{{ $address->lng }}">
            </div>

            <div style="width=300px; height: 300px" class="mt-3 card">
                <div id="map" style="height: 100%; width: 100%;"></div>
            </div>

            <div class="mt-4 text-center">
                <button class="shadow-sm btn bg-secondary-light text-primary-color fw-semibold fs-6">
                    Guardar
                </button>
            </div>
        </form>
    </div>
@endif

@endsection

@section('scripts')
<script>
    const key = '{{ env('GOOGLE_MAPS_API_KEY') }}';
</script>
<script type="module" src="{{ asset('assets/js/maps.js') }}"></script>
@endsection
