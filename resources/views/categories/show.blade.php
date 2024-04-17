@extends('layouts.main')

@section('content')

    <div class="py-5 text-center container" style="background-image: url('{{ asset('storage/img/bgs/recipes_bg3.jpeg') }}'); background-size: cover; background-position: center;">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto bg-white-opacity rounded active">
                <h1 class="display-2 text-dark">{{ ($category->name) }}</h1>
                <p class="lead text-dark">{{ __('Check out our delicious recipes below.') }}</p>
            </div>
        </div>
    </div>

    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            @if ($recipes->count())
                <div class="row">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 justify-content-center">
                        @foreach ($recipes as $recipe)
                            @include('recipes._item_album')
                        @endforeach
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-4">
                    {{ $recipes->links() }}
                </div>
            @else
                <div class="alert alert-warning">
                    {{ __('No recipes to show') }}
                </div>
            @endif
        </div>
    </div>
@endsection