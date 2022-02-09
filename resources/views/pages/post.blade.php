@extends('layouts.main-layouts')
@section('content')
    @auth
        <div class="container">
            <div class="card text-dark p-5" >
                @foreach ($posts as $post)
                    <div>
                        <!-- blocco nome - nome post  -->
                        <div class="d-flex justify-content-around">
                            Nickame: {{$post -> owner}} <br>
                            <span>
                                PostName: {{$post -> post_name}} <br>
                            </span>
                        </div>
                        <!-- testo e immagine -->
                        <div class="d-flex justify-content-around p-3">
                            <!-- testo -->
                            <span class="col text-start">
                                <p class="text-start">
                                    Description: {{$post -> description}}
                                </p> 
                                <p>
                                    Reaction: @foreach ($post -> reactions as $reaction)
                                            {{ $reaction -> nome}},
                                    @endforeach
                                </p>                           
                            </span>
                            <span class="col">
                                <!-- immagine -->
                                <div>
                                    <img class="img-fluid" src="{{$post -> immagine}}" alt="">
                                </div>            
                            </span>
                        </div>
                        <div class="d-flex justify-content-around">
                            <span>Pubblicato: {{$post ->time_of_pubblication}}</span>
                            <!-- collegamento con le categorie -->
                            <span>
                                Category:{{$post -> categorie -> Title}}
                            </span>
                            <span> Views: {{$post -> views}} - Like: {{$post ->like}}</span>
                        </div>
                        <div class="my-5">
                            <a class="btn btn-secondary" href="{{route('edit' , $post -> id)}}">EDIT</a> 
                            <a class="btn btn-danger" href="{{route('delete' , $post -> id)}}">DELETE</a>
                        </div>
                        <div class="spacing"><!-- barra di separazione --></div>
                    </div>
                @endforeach
            </div>
        </div>
    @endauth
@endsection