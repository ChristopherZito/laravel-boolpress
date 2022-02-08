@extends('layouts.main-layouts')
@section('content')
    @auth
    <div class="container text-center">

        <a class="btn btn-secondary" href="{{route('post')}}">To posts</a>
        <h2>Create new Post</h2> 
        <form  action="{{route('store')}}" method="POST">

            @method("POST")
            @csrf

            <label for="post_name" >Post name</label><br>
            <input type="text" name="post_name" placeholder="Post name"><br>

            <label for="time_of_pubblication" >Time of pubblication</label><br>
            <input type="datetime-local" name="time_of_pubblication"><br>
            
            <label for="description">Description</label><br>
            <textarea name="description"cols="20" rows="10"></textarea><br>
            
            <select class="m-3" name="category">
                @foreach ($category as $categoria)
                    <option value="{{$categoria -> id}}">{{$categoria -> Title}}</option>
                @endforeach
            </select>
            <br>

            <input type="submit" value="Create">
        </form>
    </div>
    @endauth
@endsection