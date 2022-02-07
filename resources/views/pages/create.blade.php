@extends('layouts.main-layouts')
@section('content')
    @auth
        Create new Post
        <a class="btn btn-secondary" href="{{route('post')}}">posts</a>
        <form action="{{route('store')}}" method="POST">

            @method("POST")
            @csrf
        
            <label for="owner" >owner</label><br>
            <input type="text" name="owner" placeholder="owner"><br>

            <label for="post_name" >post name</label><br>
            <input type="text" name="post_name" placeholder="post_name"><br>

            <label for="time_of_pubblication" >time of pubblication</label><br>
            <input type="datetime-local" name="time_of_pubblication" placeholder="time_of_pubblication"><br>
            
            <label for="description">description</label><br>
            <input type="text" name="description" placeholder="description"><br>

            <label for="views" >views</label><br>
            <input type="number" name="views" value="0"><br>

            <label for="like" >like</label><br>
            <input type="number" name="like" value="0"><br>

            <label for="immagine" >immagine</label><br>
            <input type="text" name="immagine" value="https://unsplash.it/300/300?image="><br>
        
            <input type="submit" value="Create">
        </form>
    @endauth
@endsection