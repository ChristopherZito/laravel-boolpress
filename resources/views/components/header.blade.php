<header>
    <div class="bg-info text-center text-danger p-3">
        <h1>
            Fakebook
        </h1>
        @auth
            <h1 class="text-warning">{{Auth::user() -> name}}</h1>
            <a class="btn btn-primary" href="{{route('logout')}}">Logout</a>
            <a class="btn btn-secondary" href="{{route('create')}}">+</a>
            <a class="btn btn-danger" href="{{route('vue_page')}}">To VUE Page</a> 
            <a class="btn btn-danger" href="{{route('post')}}">To PHP Page</a>
        @endauth
    </div>
</header>