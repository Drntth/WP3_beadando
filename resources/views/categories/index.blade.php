@extends('layouts.main')

@section('content')
<div class="container py-5">
    <div class="row align-items-center">
        <div class="col-md-6 mx-auto">
            <div class="card border-0 shadow rounded-lg">
                <div class="card-body">
                    <h2 class="card-title mb-4">Explore Recipes by Category</h2>
                    <div class="list-group">
                        @foreach($categories as $category)
                        <a href="{{ route('categories.show', ['category' => $category->id]) }}" class="list-group-item list-group-item-action">
                            {{ $category->name }}
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    @isset($recipes)
    <div class="row mt-5">
        <div class="col-md-8 mx-auto">
            <h2 class="mb-4">Recipes in {{ $category->name }}</h2>
            <div class="row row-cols-1 row-cols-md-2 g-4">
                @foreach ($recipes as $recipe)
                <div class="col">
                    @include('recipes._item_card')
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center mt-5">
        {{ $recipes->links() }}
    </div>
    @endisset
</div>
@endsection
