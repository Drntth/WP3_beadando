<div class="col-md-7{{ $loop->odd ? '' : ' order-md-2' }}">
    <a href="{{ route('recipes.show', $recipe) }}" class="card-link">
        <h2 class="featurette-heading">{{ $recipe->title }}</h2>
    </a>
    <p class="mt-auto text-start mb-0 card-text">
        <a href="{{ route('categories.show', $recipe->category) }}" class="text-muted">
            | {{ $recipe->category->name }} |
        </a>
    </p>
    <p class="lead">{{ Str::limit($recipe->description, 400) }}</p>
    <a href="{{ route('recipes.show', $recipe) }}" class="btn btn-sm btn-outline-secondary">{{ __('View') }}</a>
    @if (Auth::check() && Auth::user() == $recipe->author) 
        <a href="{{ route('recipes.edit', $recipe) }}" class="btn btn-sm btn-outline-secondary">{{ __('Edit') }}</a>
    @endif
    <small class="text-body-secondary">{{ $recipe->updated_at->format('F j, Y') }}</small>
</div>
<div class="col-md-5{{ $loop->odd ? '' : ' order-md-1' }}">
    <img class="featurette-image img-fluid mx-auto" style="max-width: 300px; max-height: 300px;" src="{{ $recipe->image }}" alt="{{ $recipe->title }}">
</div>