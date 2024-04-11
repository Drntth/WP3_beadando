@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h2>Choose a Category</h2>
        <ul class="list-group border rounded-lg">  @foreach($categories as $category)
            <li class="list-group-item bg-gray-light"> 
                <a href="{{ route('recipes.index', $category->slug) }}" class="text-light">
                    {{ $category->name }}
                </a>
            </li>
            @endforeach
        </ul>
    </div>
</div>

@isset($recipes)
<div class="row mt-5">
    <div class="col-md-6 mx-auto">
        <h2>Recipes in {{ $category->name }}</h2>  
        @foreach ($recipes as $recipe)
        @include('recipes._item_album')
        @endforeach
    </div>
</div>
<div class="d-flex justify-content-center">
    {{ $recipes->links() }}
</div>
@endisset
@endsection