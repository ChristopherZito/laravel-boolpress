@extends('layouts.main-layouts')
@section('content')
    @auth
        <div class="text-center text-light bg-dark">
            Welcome back
        </div>
    @endauth
    @guest
        <h1 class="text-center text-light bg-dark"> Join with us </h1>
        <div class="text-center text-light bg-dark d-flex justify-content-around border p-5">
            
            {{-- registrazione --}}
            <div>
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
                    <input class="btn btn-primary m-4" type="submit" value="Register">
                </form>
            </div>
            {{-- login --}}
            <div>
                <h1> Login: </h1>
                <form action="{{route('login')}}" method="POST">
                    @method("POST")
                    @csrf

                    <label for="email">Email:</label><br>
                    <input type="email" name="email" ><br>
                    <label for="password">Password:</label><br>
                    <input type="password" name="password" ><br>
                    <input class="btn btn-primary m-4" type="submit" value="Login">
                </form>
            </div>
        </div>    
    @endguest
@endsection