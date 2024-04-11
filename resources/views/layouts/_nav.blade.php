<nav class="py-2 bg-body-tertiary border-bottom">
    <div class="container d-flex flex-wrap">
        <ul class="nav me-auto">
            <li class="nav-item"><a href="/" class="nav-link link-body-emphasis px-2 active" aria-current="page">Home</a></li>
            @auth
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle link-body-emphasis px-2" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Recipes
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{ route('recipes.index') }}">View All</a></li>
                    <li><a class="dropdown-item" href="{{ route('recipes.create') }}">Create New</a></li>
                </ul>
            </li>
            @endauth
            @guest
            <li class="nav-item">
                <a href="{{ route('recipes.index') }}" class="nav-link link-body-emphasis px-2">Recipes</a>
            </li>
            @endguest
            <li class="nav-item">
                <a href="{{ route('categories.index') }}" class="nav-link link-body-emphasis px-2">Categories</a>
            </li>
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
                    @csrf <button type="submit" class="nav-link link-body-emphasis px-2">Logout</button>
                </form>
            </li>
        </ul>
        @else
        <ul class="nav">
            <li class="nav-item"><a href="{{ route('login') }}" class="nav-link link-body-emphasis px-2">Login</a></li>
            <li class="nav-item"><a href="{{ route('register') }}" class="nav-link link-body-emphasis px-2">Register</a></li>
        </ul>
        @endauth
    </div>
</nav>