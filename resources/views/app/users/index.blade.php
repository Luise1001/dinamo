@extends('app.layouts.main')

@section('styles')
@endsection

@section('content')
@section('left-button')
    @include('app.layouts.menu.components.back-button')
@endsection
@section('navbar-title')
    USUARIOS
@endsection

@if (isset($users) && $users->count() > 0)
    <div class="p-2 m-2 card">
        @foreach ($users as $user)
            <a class="p-2 nav-link d-flex justify-content-between" href="{{ route('users.edit', ['id' => $user->id]) }}">

                <div class="d-flex">
                    <div style="width:50px;" x-data="{ photoName: null, photoPreview: null }" class="text-center pe-2">
                        <div x-show="!photoPreview" x-on:click.prevent="$refs.photo.click()" style="cursor: pointer;">
                            <img style="border-radius: 100%;" src="{{ $user->profile_photo_url }}"
                                alt="{{ $user->name }}" class="w-100">
                        </div>

                        <div x-show="photoPreview" x-on:click.prevent="$refs.photo.click()" style="cursor: pointer;">
                            <img style="border-radius: 100%;" :src="photoPreview" alt="New Profile Preview"
                                class="rounded-full w-100">
                        </div>

                        @error('photo')
                            <span class="mt-2 text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    {{ ucfirst($user->name) }}
                </div>

                @if ($user->verified)
                    <label class="container-switch">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                            <path fill="#999999"
                                d="m8.6 22.5l-1.9-3.2l-3.6-.8l.35-3.7L1 12l2.45-2.8l-.35-3.7l3.6-.8l1.9-3.2L12 2.95l3.4-1.45l1.9 3.2l3.6.8l-.35 3.7L23 12l-2.45 2.8l.35 3.7l-3.6.8l-1.9 3.2l-3.4-1.45zm2.35-6.95L16.6 9.9l-1.4-1.45l-4.25 4.25l-2.15-2.1L7.4 12z" />
                        </svg>
                    </label>
                @endif
            </a>
        @endforeach
    </div>
@endif

@endsection

@section('scripts')
@endsection
