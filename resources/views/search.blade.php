@extends('layouts.main')

@section('content')

@if(isset($message))
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="alert alert-danger" role="alert">
                    <div class="text-center mb-3">
                        <h1 class="fw-light">{{ $message }}</h1>
                    </div>
                    <div class="text-center">
                        <a href="{{ $createNewUrl }}" class="btn btn-primary">{{ $createNewText }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="alert alert-success" role="alert">
                    <div class="py-5 text-center">
                        <h1 class="fw-light">Search Results for "{{ $searchTerm }}"</h1>
                    </div>
                </div>
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
@endif

@endsection