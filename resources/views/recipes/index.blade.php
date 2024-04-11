@extends('layouts.main')

@section('content')

<div class="py-5 text-center container">
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">{{ __('Recipes') }}</h1>
            <p class="lead text-body-secondary">{{ __('Check out our delicious recipes below.') }}</p>
        </div>
    </div>
</div>

<div class="container marketing">
    <hr class="featurette-divider">
    @foreach($recipes as $recipe)
        <div class="row featurette">
            @include('recipes._item_list')
        </div>
    <hr class="featurette-divider">
    @endforeach
</div>

<div class="d-flex justify-content-center mt-4">
    {{ $recipes->links() }} 
</div>
@endsection
