@extends('layouts.main')

@section('content')

    <div class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">{{ ($category->name) }}</h1>
                <p class="lead text-body-secondary">{{ __('Check out our delicious recipes below.') }}</p>
            </div>
        </div>
    </div>

    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            @if ($recipes->count())
                <div class="row">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 justify-content-center">
                        @foreach ($recipes as $recipe)
                            @include('recipes._item')
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