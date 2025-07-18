@extends('app.layouts.main')

@section('styles')
@endsection

@section('content')
@section('left-button')
    @include('app.layouts.menu.components.back-button')
@endsection
@section('navbar-title')
    EDITAR ROL
@endsection

@if (isset($role))
    <div class="p-3 m-2 card">
        <form id="edit_role" action="{{ route('roles.update') }}" method="post">
            @csrf
            @method('PUT')
            <div>
                <input type="hidden" name="id" value="{{ $role->id }}">
                <label for="name" class="text-primary-color fw-semibold fs-6 required">Nombre</label>
                <input type="text" class="form-control" name="name" value="{{ $role->name }}">
            </div>

            <div class="mt-1">
                <label for="display_name" class="text-primary-color fw-semibold fs-6 required">Nombre para
                    mostrar</label>
                <input type="text" class="form-control" name="display_name" value="{{ $role->display_name }}">
            </div>

            <div class="mt-1">
                <label for="description" class="text-primary-color fw-semibold fs-6">Descripción</label>
                <input type="text" class="form-control" id="description" name="description"
                    value="{{ $role->description }}">
            </div>

            <div class="mt-2">
                @if (isset($permissions) && $permissions->count() > 1)
                    @foreach ($permissions as $permission)
                        <span class="p-2 nav-link d-flex justify-content-between">
                            {{ $permission->display_name }}

                            <label class="container-switch">
                                <input onClick="permission(this, {{ $permission->id }})" type="checkbox"
                                    class="toggle-switch"
                                    {{ $role->permissions->contains($permission->id) ? 'checked' : '' }}>
                                <span class="slider"></span>
                            </label>
                        </span>
                    @endforeach
                @endif
            </div>

            <div class="mt-3 text-center">
                <button type="submit" class="btn btn-md bg-secondary-light text-primary-color fw-semibold fs-6">Guardar
                </button>
            </div>
        </form>
    </div>
@endif

@endsection

@section('scripts')
<script>
    let list_permissions = @json($role->permissions->pluck('id')); 
</script>
<script src="{{ asset('assets/js/app/roles/edit.js') }}"></script>

@endsection
