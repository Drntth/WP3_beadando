@extends('layouts.main')

@section('content')

@include('layouts._carousel')

@if(isset($message))
    @include('recipes._not-found')
@else
    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 justify-content-center">
                @foreach($recipes as $recipe)
                    @include('recipes._item_album')
                @endforeach
            </div>
            <div class="d-flex justify-content-center mt-4">
                {{ $recipes->links() }} 
            </div>
        </div>
    </div>
@endif

@endsection