<div class="col d-flex">
    <div class="card shadow-sm w-100">
        <img src="{{ $recipe->image }}" class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
        <div class="card-body d-flex flex-column justify-content-between">
            <div>
                <a href="{{ route('recipes.show', $recipe) }}" class="text-light">
                    <h5 class="card-title">{{ $recipe->title }}</h5>
                </a>
                <p class="mt-auto text-start mb-0 card-text">
                    <a href="{{ route('categories.show', $recipe->category) }}" class="text-light">
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