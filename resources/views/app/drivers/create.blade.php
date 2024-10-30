@extends('app.layouts.main')

@section('styles')
@endsection

@section('content')
@section('left-button')
    @include('app.layouts.menu.components.back-button')
@endsection
@section('navbar-title')
    AGREGAR CONDUCTOR
@endsection

<div class="p-3 m-2 card">
    <form action="{{ route('drivers.store') }}" method="post">
        @csrf
        <div>
            <label for="responsible_id" class="text-primary-color fw-semibold fs-6 required">Usuario</label>
            <select class="form-select select2" name="responsible_id">
                <option value="">Seleccionar</option>
                @if (isset($users) && $users->count() > 0)
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ ucwords($user->email) }}</option>
                    @endforeach
                @endif
            </select>
        </div>

        <div class="mt-1">
            <label for="name" class="text-primary-color fw-semibold fs-6 required">Nombre</label>
            <input type="text" class="form-control" name="name" placeholder="Nombre">
        </div>

        <div class="mt-1">
            <label for="last_name" class="text-primary-color fw-semibold fs-6 required">Apellido</label>
            <input type="text" class="form-control" name="last_name" placeholder="Apellido">
        </div>

        <div class="mt-1">
            <label for="document" class="text-primary-color fw-semibold fs-6 required">Documento</label>
            <input type="text" class="form-control" name="document" placeholder="Ej. V123456789">
        </div>

        <div class="mt-1">
            <label for="phone" class="text-primary-color fw-semibold fs-6 required">Télefono</label>
            <input type="text" class="form-control" name="phone" placeholder="Ej. 584141234567">
        </div>

        <div class="mt-1">
            <label for="license_number" class="text-primary-color fw-semibold fs-6 required">Licencia</label>
            <input type="text" class="form-control" name="license_number" placeholder="Ej. 123456789">
        </div>

        <div class="mt-1 d-flex">
            <div class="col-6 pe-1">
                <label for="license_type" class="text-primary-color fw-semibold fs-6 required">Tipo licencia</label>
                <input type="number" class="form-control" name="license_type" placeholder="Ej. 4">
            </div>
            <div class="col-6 pe-1">
                <label for="license_expiration" class="text-primary-color fw-semibold fs-6 required">Expira</label>
                <input type="date" class="form-control" name="license_expiration" placeholder="Expiración">
            </div>

        </div>

        <div class="mt-3 text-center">
            <button type="submit"
                class="shadow-sm btn btn-md bg-secondary-light text-primary-color fw-semibold fs-6">Guardar</button>
        </div>
    </form>
</div>

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
@endsection
