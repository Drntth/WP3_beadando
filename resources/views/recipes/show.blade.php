@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1 class="display-1">{{ $recipe->title }}</h1>
                </div>
                <div class="card-body">
                    <p>{{ $recipe->author->name }} | {{ $recipe->category->name }} | {{ $recipe->updated_at->diffForHumans() }}</p>
                    <p>{{ $recipe->description }}</p>
                    @if ($recipe->image)
                    <div>
                        <img src="{{ $recipe->image }}" alt="Recipe Image" class="img-fluid">
                    </div>
                    @endif
                    <div>
                        <h4>{{ __('Ingredients') }}</h4>
                        <p>{{ $recipe->ingredients }}</p>
                    </div>
                    <div>
                        <h4>{{ __('Instructions') }}</h4>
                        <p>{{ $recipe->instructions }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection