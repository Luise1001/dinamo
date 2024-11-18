@extends('app.layouts.main')

@section('styles')
@endsection

@section('content')
@section('left-button')
    @include('app.layouts.menu.components.back-button')
@endsection
@section('navbar-title')
    EDITAR MONEDA
@endsection

@if (isset($currency))
    <div class="p-3 m-2 card">
        <form action="{{ route('currencies.update') }}" method="post">
            @csrf
            @method('PUT')
            <div>
                <input type="hidden" name="id" value="{{ $currency->id }}">
                <label for="name" class="text-primary-color fw-semibold fs-6 required">Nombre</label>
                <input type="text" class="form-control" name="name" value="{{ $currency->name }}"
                    placeholder="Nombre">
            </div>

            <div class="mt-1">
                <label for="code" class="text-primary-color fw-semibold fs-6 required">Código</label>
                <input type="text" class="form-control" name="code" value="{{ $currency->code }}"
                    placeholder="Ej. USD">
            </div>

            <div class="mt-1">
                <label for="rate" class="text-primary-color fw-semibold fs-6 required">Tasa</label>
                <input onkeypress="return isNumber(event, this, true)" type="text" class="form-control"
                    id="rate" name="rate" value="{{ number_format($currency->rate, 2, ',', '.') }}"
                    placeholder="Tasa">
            </div>

            <div class="mt-1">
                <label for="min_user" class="text-primary-color fw-semibold fs-6 required">Minimo por usuario</label>
                <input onkeypress="return isNumber(event, this, true)" type="text" class="form-control"
                    id="min_user" name="min_user" value="{{ number_format($currency->min_user, 2, ',', '.') }}"
                    placeholder="Minimo por usuario">
            </div>

            <div class="mt-1">
                <label for="max_user" class="text-primary-color fw-semibold fs-6 required">Máximo por usuario</label>
                <input onkeypress="return isNumber(event, this, true)" type="text" class="form-control"
                    id="max_user" name="max_user" value="{{ number_format($currency->max_user, 2, ',', '.') }}"
                    placeholder="Máximo por usuario">
            </div>

            <div class="mt-1">
                <label for="max_driver" class="text-primary-color fw-semibold fs-6 required">Máximo por
                    conductor</label>
                <input onkeypress="return isNumber(event, this, true)" type="text" class="form-control"
                    id="max_driver" name="max_driver"
                    value="{{ number_format($currency->max_driver, 2, ',', '.') }}"
                    placeholder="Máximo por conductor">
            </div>

            <div class="mt-3 text-center">
                <button type="submit"
                    class="btn btn-md bg-secondary-light text-primary-color fw-semibold fs-6">Guardar</button>
            </div>
        </form>
    </div>
@endif

@endsection

@section('scripts')
<script src="{{ asset('assets/js/amount.js') }}"></script>
<script>
    const rate = document.getElementById('rate');
    const min_user = document.getElementById('min_user');
    const max_user = document.getElementById('max_user');
    const max_driver = document.getElementById('max_driver');

    AmountKeyUp(rate);
    AmountKeyUp(min_user);
    AmountKeyUp(max_user);
    AmountKeyUp(max_driver);
</script>
@endsection
