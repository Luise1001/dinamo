@extends('app.layouts.main')

@section('styles')
@endsection

@section('content')
@section('left-button')
    @include('app.layouts.menu.components.back-button')
@endsection
@section('navbar-title')
    NUEVA ENTREGA
@endsection

<div class="p-2 m-2 card">
    <form action="{{ route('delivery.store') }}" method="post">
        @csrf
        <div>
            <label for="name" class="fw-semibold text-primary-color required">Moneda</label>
            <select class="form-select" name="currency_id">
                <option value="">Seleccionar</option>
                @if (isset($currencies))
                    @foreach ($currencies as $currency)
                        <option value="{{ $currency->id }}">{{ $currency->name }}</option>
                    @endforeach
                @endif
            </select>
        </div>

        <div class="mt-1">
            <label for="name" class="fw-semibold text-primary-color required">Monto</label>
            <input onkeypress="return isNumber(event, this, true)" type="text" class="form-control" id="amount"
                name="amount" value="0,00" placeholder="Monto">
        </div>

        <div class="mt-1">
            <label for="adress" class="fw-semibold text-primary-color required">Destino</label>
            <select class="form-select" name="place_id">
                <option value="">Seleccionar</option>
                @if (isset($places))
                    @foreach ($places as $place)
                        <option value="{{ $place->id }}">{{ $place->name }}</option>
                    @endforeach
                @endif
            </select>
        </div>

        <div class="mt-1 my-location">
            <label for="adress" class="fw-semibold text-primary-color required">Dirección</label>
            <a id="myAddress" class="mx-3">Mis direcciones</a>
            <input class="form-control" id="address" name="address" type="text" placeholder="Buscar dirección">
            <span id="error" class="text-danger"></span>

            <div>
                <input type="hidden" id="lat" name="lat">
                <input type="hidden" id="lng" name="lng">
            </div>

            <div style="width=300px; height: 300px" class="mt-3 card">
                <div id="map" style="height: 100%; width: 100%;"></div>
            </div>
        </div>

        <div class="mt-1 my-address d-none">
            <label for="adress" class="fw-semibold text-primary-color required">Mis direcciones</label>
            <a id="myLocation" class="mx-3">Mi ubicación</a>
            <select class="form-select" id="address_id" name="address_id">
                <option value="">Seleccionar</option>
                @if (isset($addresses))
                    @foreach ($addresses as $address)
                        <option value="{{ $address->id }}">{{ $address->name }}</option>
                    @endforeach
                @endif
            </select>
        </div>


        <div class="mt-4 text-center">
            <button class="shadow-sm btn bg-secondary-light text-primary-color fw-semibold fs-6">
                Guardar
            </button>
        </div>
    </form>
</div>

@endsection

@section('scripts')
<script>
    const key = '{{ env('GOOGLE_MAPS_API_KEY') }}';
</script>
<script type="module" src="{{ asset('assets/js/maps.js') }}"></script>
<script src="{{ asset('assets/js/amount.js') }}"></script>
<script src="{{ asset('assets/js/app/delivery/create.js') }}"></script>
@endsection
