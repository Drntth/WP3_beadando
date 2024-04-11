@extends('layouts.main')

@section('content')

@include('layouts._carousel')

{{-- @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif --}}

<div class="album py-5 bg-body-tertiary">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 justify-content-center">
            @foreach($recipes as $recipe)
                @include('recipes._item')
            @endforeach
        </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $recipes->links() }} 
        </div>
    </div>
</div>

@endsection