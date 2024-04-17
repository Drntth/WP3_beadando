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
                    <div class="row">
                        <div class="col-md-6 py-2">
                            <a href="#" class="text-decoration-none">{{ $recipe->author->name }}</a> | 
                            <a href="{{ route('recipes.index', $recipe->category->slug) }}" class="text-light">{{ $recipe->category->name }}</a> | 
                            <span class="text-muted">{{ $recipe->updated_at->format('F j, Y') }}</span>
                        </div>
                        <div class="col-md-6 text-end">
                            @auth
                                @if ($recipe->favorites()->where('user_id', auth()->id())->exists())
                                    <form action="{{ route('favorites.destroy', $recipe->favorites()->where('user_id', auth()->id())->first()->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link text-danger">
                                            <i class="fas fa-star"></i>
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('favorites.store') }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                                        <input type="hidden" name="recipe_id" value="{{ $recipe->id }}">
                                        <button type="submit" class="btn btn-link text-warning">
                                            <i class="far fa-star"></i>
                                        </button>
                                    </form>
                                @endif
                            @endauth
                        </div>
                    </div>                                                                 
                    <hr>
                    <p>{{ $recipe->description }}</p>
                    <hr>
                    @if ($recipe->image)
                    <div class="text-center">
                        <img src="{{ $recipe->image }}" alt="Recipe Image" class="img-fluid">
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
                            <div class="text-end">
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
