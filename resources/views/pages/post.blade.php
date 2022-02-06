@extends('layouts.main-layouts')
@section('content')
    @auth
        <post-component></post-component>
    @endauth
@endsection