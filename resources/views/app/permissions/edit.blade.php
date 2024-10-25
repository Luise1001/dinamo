@extends('app.layouts.main')

@section('styles')
@endsection

@section('content')
@section('left-button')
    @include('app.layouts.menu.components.back-button')
@endsection
@section('navbar-title')
    EDITAR PERMISO
@endsection

<div class="p-3 m-2 card">
    @if (isset($permission))
        <form action="{{ route('permissions.update') }}" method="post">
            @csrf
            @method('PUT')
            <div>
                <input type="hidden" name="id" value="{{ $permission->id }}">
                <label for="name" class="text-dark-gray fw-semibold fs-6 required">Nombre</label>
                <input type="text" class="form-control" name="name" value="{{ $permission->name }}">
            </div>

            <div class="mt-1">
                <label for="display_name" class="text-dark-gray fw-semibold fs-6 required">Nombre para mostrar</label>
                <input type="text" class="form-control" name="display_name" value="{{ $permission->display_name }}">
            </div>

            <div class="mt-1">
                <label for="route" class="text-dark-gray fw-semibold fs-6 required">Ruta</label>
                <input type="text" class="form-control" name="route" value="{{ $permission->route }}">
            </div>

            <div class="mt-1">
                <label for="description" class="text-dark-gray fw-semibold fs-6">Descripción</label>
                <input type="text" class="form-control" id="description" name="description"
                    value="{{ $permission->description }}">
            </div>

            <div class="mt-1">
                <input type="checkbox" name="hidden" {{ $permission->hidden == true ? 'checked' : '' }} value="1" >
                <label for="active" class="text-medium-gray">ocultar</label>
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
@endsection
