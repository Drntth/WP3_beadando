@extends('layouts.main')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="display-4">{{ __('Create new recipe') }}</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('recipes.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title">{{ __('Title') }}</label>
                <input type="text" name="title" class="form-control">
            </div>
            <div class="mb-3">
                <label for="category_id">{{ __('Category') }}</label>
                <select name="category_id" class="form-control">
                    <option>{{ __('Choose a category') }}</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="description">{{ __('Description') }}</label>
                <textarea name="description" class="form-control" rows="5"></textarea>
            </div>
            <div class="mb-3">
                <label for="ingredients">{{ __('Ingredients') }}</label>
                <textarea name="ingredients" class="form-control" rows="10"></textarea>
            </div>
            <div class="mb-3">
                <label for="instructions">{{ __('Instructions') }}</label>
                <textarea name="instructions" class="form-control" rows="10"></textarea>
            </div>
            <div class="mb-3">
                <label for="image">{{ __('Image (Optional)') }}</label>
                <input type="file" name="image" id="image">
            </div>
            <div>
                <button class="btn btn-primary btn-lg">{{ __('Create') }}</button>
            </div>
        </form>
    </div>
</div>
@endsection