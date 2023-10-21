<div class="block-header py-lg-2 py-1 px-lg-4 px-3">
    <div class="row g-3">
        <div class="col-md-4 col-sm-12">
            <h2 class="m-0 fs-5 text-capitalize">{{ str_replace('.', ' ', Route::currentRouteName()) }}</h2>
            <ul class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="{{ url('/home') }}">Home</a>
                </li>
                @if(Route::currentRouteName() !== 'home')
                <li class="breadcrumb-item active">
                    <a href="{{ url()->current() }}">{{ str_replace('.', ' / ', Route::currentRouteName()) }}</a>
                </li>
                @endif
            </ul>
        </div>
        <div class="col-md-8 col-sm-12 text-md-ends" id="messages">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
        </div>
    </div>
</div>