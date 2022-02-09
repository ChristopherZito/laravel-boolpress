@extends('layouts.main-layouts')
@section('content')
    @auth
    <div class="container text-center">
        <a class="btn btn-secondary" href="{{route('post')}}">To posts</a>
        <h2>Edit Post</h2> 
        <form  action="{{route('update', $posts -> id)}}" method="POST">

            @method("POST")
            @csrf

            <label for="post_name" >Post name</label><br>
            <input type="text" name="post_name" placeholder="Post name" value="{{$posts -> post_name}}"><br>

            <label for="time_of_pubblication" >Time of pubblication</label><br>
            <input type="datetime-local" name="time_of_pubblication" value="{{$posts -> time_of_pubblication}}"><br>
            
            <label for="description">Description</label><br>
            <textarea name="description"cols="20" rows="10" >{{$posts -> description}}</textarea><br>
            
            <select class="m-3" name="category">
                @foreach ($category as $categoria)
                    <option value="{{$categoria -> id}}" 
                        {{-- controllo per la categoria selezionata --}}
                        @if ($categoria -> id == $posts -> categorie -> id)
                            selected
                        @endif
                        
                        >{{$categoria -> Title}}</option>
                @endforeach
            </select>
            
            <h3>Reactions</h3>
            @foreach ($reactions as $reaction)

            <input type="checkbox" name="reactions[]" value="{{$reaction -> id}}"
            {{-- controllo per le reaction selezionate --}}
            @foreach ($posts -> reactions as $posReac)
                @if ($reaction -> id == $posReac -> id)
                    checked
                @endif
            @endforeach
            
            > {{$reaction -> nome}}<br>

            @endforeach
            <br>

            <input type="submit" value="Edit">
        </form>
    </div>
    @endauth
@endsection