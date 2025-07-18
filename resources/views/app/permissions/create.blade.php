@extends('app.layouts.main')

@section('styles')
@endsection

@section('content')
@section('left-button')
    @include('app.layouts.menu.components.back-button')
@endsection
@section('navbar-title')
    CREAR PERMISO
@endsection

<div class="p-3 m-2 card">
        <form action="{{ route('permissions.store') }}" method="post">
            @csrf
            <div>
                <label for="name" class="text-primary-color fw-semibold fs-6 required">Nombre</label>
                <input type="text" class="form-control" name="name" placeholder="Nombre">
            </div>

            <div class="mt-1">
                <label for="display_name" class="text-primary-color fw-semibold fs-6 required">Nombre para mostrar</label>
                <input type="text" class="form-control" name="display_name" placeholder="Nombre para mostrar">
            </div>

            <div class="mt-1">
                <label for="route" class="text-primary-color fw-semibold fs-6 required">Ruta</label>
                <input type="text" class="form-control" name="route" placeholder="Ruta">
            </div>

            <div class="mt-1">
                <label for="description" class="text-primary-color fw-semibold fs-6">Descripción</label>
                <input type="text" class="form-control" id="description" name="description"
                    placeholder="Descripción">
            </div>

            <div class="mt-3 text-center">
                <button type="submit"
                    class="btn btn-md bg-secondary-light text-primary-color fw-semibold fs-6">Guardar</button>
            </div>
        </form>
</div>

@endsection

@section('scripts')
@endsection
