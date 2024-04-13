<div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="4" aria-label="Slide 5"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="5" aria-label="Slide 6"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('/storage/img/carousel/desserts.jpeg') }}" class="d-block w-100" alt="Desserts">
            <div class="container">
                <div class="carousel-caption text-start rounded p-3 bg-white-opacity">
                    <h1 class="display-1">Desserts</h1>
                    <p class="lead">Indulge in our delightful dessert recipes for a sweet ending.</p>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('storage/img/carousel/mainCourses.jpeg') }}" class="d-block w-100" alt="Main Dishes">
            <div class="container">
                <div class="carousel-caption rounded p-3 bg-white-opacity">
                    <h1 class="display-1">Main Dishes</h1>
                    <p class="lead">Explore our mouthwatering main course recipes for a hearty meal.</p>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('storage/img/carousel/salads.jpeg') }}" class="d-block w-100" alt="Salads">
            <div class="container">
                <div class="carousel-caption text-end rounded p-3 bg-white-opacity">
                    <h1 class="display-1">Salads</h1>
                    <p class="lead">Find refreshing salad recipes to brighten up your plate.</p>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('storage/img/carousel/sideDishes.jpeg') }}" class="d-block w-100" alt="Side Dishes">
            <div class="container">
                <div class="carousel-caption text-start rounded p-3 bg-white-opacity">
                    <h1 class="display-1">Side Dishes</h1>
                    <p class="lead">Discover delicious side dish recipes to complement your main course.</p>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('storage/img/carousel/snacks.jpeg') }}" class="d-block w-100" alt="Snacks">
            <div class="container">
                <div class="carousel-caption rounded p-3 bg-white-opacity">
                    <h1 class="display-1">Snacks</h1>
                    <p class="lead">Delve into our delectable snack recipes to keep your taste buds entertained between meals.</p>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('storage/img/carousel/soups.jpeg') }}" class="d-block w-100" alt="Soups">
            <div class="container">
                <div class="carousel-caption text-end rounded p-3 bg-white-opacity">
                    <h1 class="display-1">Soups</h1>
                    <p class="lead">Discover our comforting soup recipes for a warm and satisfying meal.</p>
                </div>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
