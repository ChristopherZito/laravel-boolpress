@extends('layouts.main-layouts')
@section('content')
    @auth
        <h1>{{Auth::user() -> name}}</h1>
        <a class="btn btn-primary" href="{{route('logout')}}">Logout</a>

        <h2>Benvenuto nei tuoi post</h2>

        <post-component></post-component>
    @endauth
@endsection