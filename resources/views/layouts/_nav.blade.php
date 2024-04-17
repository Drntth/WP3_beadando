<nav class="py-2 bg-body-tertiary border-bottom">
    <div class="container d-flex flex-wrap">
        <ul class="nav me-auto">
            <li class="nav-item"><a href="/" class="nav-link link-body-emphasis px-2 active" aria-current="page">
                <i class="fas fa-home"></i> Home
            </a></li>
            @auth
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle link-body-emphasis px-2" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-book-open"></i> Recipes
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{ route('recipes.index') }}">View All</a></li>
                    <li><a class="dropdown-item" href="{{ route('recipes.create') }}">Create New</a></li>
                </ul>
            </li>
            @else
            <li class="nav-item">
                <a href="{{ route('recipes.index') }}" class="nav-link link-body-emphasis px-2"><i class="fas fa-book-open"></i> Recipes</a>
            </li>
            @endauth
            <li class="nav-item">
                <a href="{{ route('categories.index') }}" class="nav-link link-body-emphasis px-2"><i class="fas fa-utensils"></i> Categories</a>
            </li>
            @auth
            <li class="nav-item">
                <a href="{{ route('favorites.index') }}" class="nav-link link-body-emphasis px-2"><i class="fas fa-star"></i> Favorites</a>
            </li>
            @endauth
        </ul>
        
        @auth
        <ul class="nav">
            <li class="nav-item">
                <a href="{{ route('profile') }}" class="nav-link link-body-emphasis px-2">
                    <i class="fas fa-user"></i> Profile
                </a>
            </li>
            <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf <button type="submit" class="nav-link link-body-emphasis px-2"><i class="fas fa-sign-out-alt"></i> Logout</button>
                </form>
            </li>
        </ul>
        @else
        <ul class="nav">
            <li class="nav-item"><a href="{{ route('login') }}" class="nav-link link-body-emphasis px-2"><i class="fas fa-sign-in-alt"></i> Login</a></li>
            <li class="nav-item"><a href="{{ route('register') }}" class="nav-link link-body-emphasis px-2"><i class="fas fa-user-plus"></i> Register</a></li>
        </ul>
        @endauth
    </div>
</nav>
