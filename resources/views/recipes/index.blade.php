@extends('layouts.main')

@section('content')

<div class="py-5 text-center container" style="background-image: url('{{ asset('storage/img/bgs/recipes_bg.jpeg') }}'); background-size: cover; background-position: center;">
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto bg-white-opacity rounded active">
            <h1 class="display-2 text-dark">{{ __('Recipes') }}</h1>
            <p class="lead text-dark">{{ __('Check out our delicious recipes below.') }}</p>
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
