<header class="py-3 border-bottom">
    <div class="container d-flex flex-wrap justify-content-center justify-content-md-between">
        <div class="d-flex align-items-center mb-3 mb-md-0 me-md-auto">
            <a href="/" class="d-flex align-items-center link-body-emphasis text-decoration-none">
                <img id="logoImg" src="{{ asset('android-chrome-192x192_white.png') }}" alt="Logo" width="40" height="40" class="me-2">
                <span class="fs-4">Recipes</span>
            </a>
        </div>
        <div class="d-flex flex-column flex-md-row"> 
            <button id="toggleModeBtn" class="btn btn-link link-body-emphasis mx-md-3">
                <i id="modeIcon" class="fas"></i>
            </button>
            
            <form class="d-flex mb-3 mb-md-0 me-md-3" role="search" action="{{ route('search') }}">  
                <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</header>
