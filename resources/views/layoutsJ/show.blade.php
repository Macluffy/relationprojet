@extends('template.welcome')

@section('content')

<div class="card m-5" style="width: 18rem; background-color: rgb(248, 237, 185);">
    <img src="{{asset('img/' .$joueur->photo->nom)}}" class="card-img-top" alt="...">
    <div class="card-body">
        <span class="fw-bold">Nom :</span> <h5 class="card-title">{{$joueur->nom}} </h5>
        <span class="fw-bold">Prenom :</span><p class="card-text">{{$joueur->prenom}} </p>
        <span class="fw-bold">Age :</span><p class="card-text"> {{$joueur->age}}</p>
        <span class="fw-bold">Telephone :</span><p class="card-text"> {{$joueur->telephone}}</p>
        <span class="fw-bold">Email :</span><p class="card-text"> {{$joueur->email}}</p>
        <span class="fw-bold">Genre :</span><p class="card-text"> {{$joueur->genre}}</p>
        <span class="fw-bold">Pays :</span><p class="card-text"> {{$joueur->pays}}</p>
        <span class="fw-bold">Role :</span><p class="card-text"> {{$joueur->role_id}}</p>
        <span class="fw-bold">Equipe :</span>
            @if ($joueur->equipe == null)

            <p class="card-text"> pas d'equipe</p>
            @else
                <a href="{{route('equipes.show',$joueur->equipe->id)}} " style="text-decoration:none; "><p class="card-text"> {{$joueur->equipe->nom}}</p></a>
            @endif
        
        
    </div>
</div>


@endsection