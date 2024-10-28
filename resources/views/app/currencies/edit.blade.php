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
                <label for="limit_user" class="text-primary-color fw-semibold fs-6 required">Limite por usuario</label>
                <input onkeypress="return isNumber(event, this, true)" type="text" class="form-control"
                    id="limit_user" name="limit_user" value="{{ number_format($currency->limit_user, 2, ',', '.') }}"
                    placeholder="Limite por usuario">
            </div>

            <div class="mt-1">
                <label for="limit_driver" class="text-primary-color fw-semibold fs-6 required">Limite por
                    conductor</label>
                <input onkeypress="return isNumber(event, this, true)" type="text" class="form-control"
                    id="limit_driver" name="limit_driver"
                    value="{{ number_format($currency->limit_driver, 2, ',', '.') }}"
                    placeholder="Limite por conductor">
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
<script src="{{ asset('assets/js/app/utilities/amount.js') }}"></script>
<script>
    const rate = document.getElementById('rate');
    const limit_user = document.getElementById('limit_user');
    const limit_driver = document.getElementById('limit_driver');

    AmountKeyUp(rate);
    AmountKeyUp(limit_user);
    AmountKeyUp(limit_driver);
</script>
@endsection
