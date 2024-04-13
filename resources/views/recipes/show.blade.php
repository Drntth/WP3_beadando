@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header">
                    <h1 class="display-4 text-center">{{ $recipe->title }}</h1>
                </div>
                <div class="card-body">
                    <p class="text-center">
                        <a href="#" class="text-decoration-none">{{ $recipe->author->name }}</a> | 
                        <a href="{{ route('recipes.index', $recipe->category->slug) }}" class="text-light">{{ $recipe->category->name }} </a>| 
                        <span class="text-muted">{{ $recipe->updated_at->format('F j, Y') }}</span>
                    </p>
                    <hr>
                    <p>{{ $recipe->description }}</p>
                    <hr>
                        @if ($recipe->image)
                        <div class="text-center">
                            {{-- <div class="img-container"> --}}
                                <img src="{{ $recipe->image }}" alt="Recipe Image" class="img-fluid">
                            {{-- </div> --}}
                        </div>                        
                        <hr>
                        @endif
                    <div>
                        <h4>{{ __('Ingredients') }}</h4>
                        <p>{{ $recipe->ingredients }}</p>
                    </div>
                    <hr>
                    <div>
                        <h4>{{ __('Instructions') }}</h4>
                        <p>{{ $recipe->instructions }}</p>
                    </div>
                    <hr>
                    <div>
                        <h4>{{ __('Replies') }}: {{ $recipe->comments()->count() }}</h4>
                        <hr>
                        @auth
                            <form class="mb-4" action="{{ route('recipes.comment', $recipe) }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <textarea class="form-control" name="comment" placeholder="{{ __('Comment text...') }}"></textarea>
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-primary btn-lg" type="submit">
                                        {{ __('Comment') }}
                                    </button>
                                </div>
                            </form>
                        @endauth
                        @foreach ($recipe->comments as $comment)
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="mb-2">
                                    <a href="#" class="text-decoration-none">
                                        {{ $comment->user->name }}
                                    </a>
                                    |
                                    <span class="text-muted">{{ $comment->created_at->format('F j, Y') }}</span>
                                </div>
                                {{ $comment->message }}
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
