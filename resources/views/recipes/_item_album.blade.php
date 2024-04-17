<div class="col d-flex">
    <div class="card shadow-sm w-100">
        <img src="{{ $recipe->image }}" class="card-img-top img-fluid mx-auto" style="max-width: 300px; max-height: 300px;" alt="{{ $recipe->title }}">
        <div class="card-body d-flex flex-column justify-content-between">
            <div>
                <a href="{{ route('recipes.show', $recipe) }}" class="card-link">
                    <h5 class="card-title">{{ $recipe->title }}</h5>
                </a>
                <p class="mt-auto text-start mb-0 card-text">
                    <a href="{{ route('categories.show', $recipe->category) }}" class="card-link">
                        | {{ $recipe->category->name }} |
                    </a>
                </p>
                <p class="card-text" >{{ Str::limit($recipe->description, 200) }}</p>
            </div>
            <div class="mt-auto">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <a href="{{ route('recipes.show', $recipe) }}" class="btn btn-sm btn-outline-secondary">{{ __('View') }}</a>
                        @if (Auth::check() && Auth::user() == $recipe->author) 
                        <a href="{{ route('recipes.edit', $recipe) }}" class="btn btn-sm btn-outline-secondary">{{ __('Edit') }}</a>
                        @endif
                    </div>
                    <small class="text-body-secondary ms-auto">{{ $recipe->updated_at->format('F j, Y') }}</small>
                </div>
            </div>
        </div>
    </div>
</div>