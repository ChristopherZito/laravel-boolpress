<header>
    <div class="bg-info text-center text-danger p-3">
        <h1>
            Fakebook
        </h1>
        @auth
            <h1 class="text-warning">{{Auth::user() -> name}}</h1>
            <a class="btn btn-primary" href="{{route('logout')}}">Logout</a>
        @endauth
    </div>
</header>