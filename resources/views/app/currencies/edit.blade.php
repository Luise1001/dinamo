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

<div class="p-3 m-2 card">
    @if (isset($currency))
        <form action="{{ route('currencies.update') }}" method="post">
            @csrf
            @method('PUT')
            <div>
                <input type="hidden" name="id" value="{{ $currency->id }}">
                <label for="name" class="text-dark-gray fw-semibold fs-6 required">Nombre</label>
                <input type="text" class="form-control" name="name" value="{{ $currency->name }}" placeholder="Nombre">
            </div>

            <div class="mt-1">
                <label for="code" class="text-dark-gray fw-semibold fs-6 required">Código</label>
                <input type="text" class="form-control" name="code" value="{{ $currency->code }}"
                    placeholder="Ej. USD">
            </div>

            <div class="mt-1">
                <label for="rate" class="text-dark-gray fw-semibold fs-6 required">Tasa</label>
                <input onkeypress="return isNumber(event, this, true)" type="text" class="form-control"
                    id="rate" name="rate" value="{{ number_format($currency->rate, 2, ',', '.') }}"
                    placeholder="Tasa">
            </div>

            <div class="mt-1">
                <label for="limit_user" class="text-dark-gray fw-semibold fs-6 required">Limite por usuario</label>
                <input onkeypress="return isNumber(event, this, true)" type="text" class="form-control"
                    id="limit_user" name="limit_user" value="{{ number_format($currency->limit_user, 2, ',', '.') }}" placeholder="Limite por usuario">
            </div>

            <div class="mt-1">
                <label for="limit_driver" class="text-dark-gray fw-semibold fs-6 required">Limite por conductor</label>
                <input onkeypress="return isNumber(event, this, true)" type="text" class="form-control"
                    id="limit_driver" name="limit_driver" value="{{ number_format($currency->limit_driver, 2, ',', '.') }}" placeholder="Limite por conductor">
            </div>

            <div class="mt-3 text-center">
                <button type="submit"
                    class="btn btn-md bg-light-blue text-dark-green fw-semibold fs-6">Guardar</button>
            </div>
        </form>
    @endif
</div>

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
