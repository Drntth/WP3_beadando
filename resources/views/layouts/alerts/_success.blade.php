<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (Session::has('success'))
                <div class="alert alert-success" role="alert">
                    <div class="py-5 text-center">
                        {{ Session::get('success') }}
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
