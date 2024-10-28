@extends('app.layouts.main')

@section('styles')
@endsection

@section('content')
@section('left-button')
    @include('app.layouts.menu.components.back-button')
@endsection
@section('navbar-title')
    DESTINOS
@endsection

@section('right-button')
    @include('app.layouts.menu.components.plus', ['route' => route('places.create')])
@endsection

@if (isset($places) && $places->count() > 0)
<div class="p-2 m-2 card">
    
</div>
@endif

@endsection

@section('scripts')
<script>
    const key = '{{ env('GOOGLE_MAPS_API_KEY') }}';
</script>
<script type="module" src="{{ asset('assets/js/app/utilities/maps.js') }}"></script>
@endsection
