@extends('layouts.main')

@section('content')

<div class="py-5 text-center container">
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">{{ __('Favorites') }}</h1>
            <p class="lead text-body-secondary">{{ __('Check out your favorited delicious recipes below.') }}</p>
        </div>
    </div>
</div>
@if($favorites->isEmpty())
    <div class="alert alert-danger text-center" role="alert">
        {{ __('You have no favorites yet.') }}
    </div>
@else
    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 justify-content-center">
                @foreach($favorites as $favorite)
                    @include('recipes._item_album', ['recipe' => $favorite->recipe])
                @endforeach
            </div>
            <div class="d-flex justify-content-center mt-4">
                {{ $favorites->links() }} 
            </div>
        </div>
    </div>
@endif
@endsection
