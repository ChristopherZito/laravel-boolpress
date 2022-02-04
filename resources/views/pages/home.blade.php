@extends('layouts.main-layouts')
@section('content')
    @auth
        <h1>{{Auth::user() -> name}}</h1>
        <a class="btn btn-primary" href="{{route('logout')}}">Logout</a>
        @else
            <h1> Join with us </h1>
        @endauth
        @guest
        <h1> Register: </h1>
        <form action="{{route('register')}}" method="POST">
            @method("POST")
            @csrf

            <label for="name">Username:</label><br>
            <input type="text" name="name" ><br>
            <label for="email">Email:</label><br>
            <input type="email" name="email" ><br>
            <label for="password">Password:</label><br>
            <input type="password" name="password" ><br>
            <label for="password_confirmation">Confirm Password:</label><br>
            <input type="password" name="password_confirmation" ><br>
            <input type="submit" value="Register">
        </form>

        <br>
        <hr class="bg-white">
        <br>

        <h1> Login: </h1>
        <form action="{{route('login')}}" method="POST">
            @method("POST")
            @csrf

            <label for="email">Email:</label><br>
            <input type="email" name="email" ><br>
            <label for="password">Password:</label><br>
            <input type="password" name="password" ><br>
            <input type="submit" value="Login">
        </form>
    @endguest
@endsection