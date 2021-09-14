@extends('template.welcome')

@section('content')

<div class="card m-5" style="width: 18rem; background-color: rgb(248, 237, 185);">
    <div class="card-body">
    <span class="fw-bold" >Nom :</span>  <h5 class="card-title">{{$equipe->nom}} </h5>
    <span class="fw-bold" >Ville :</span>  <p class="card-text">{{$equipe->ville}} </p>
    <span class="fw-bold" >Pays :</span>  <p class="card-text"> {{$equipe->pays}}</p>
    <span class="fw-bold" >Nombre de joueur :</span>  <p class="card-text">{{count($equipe->joueurs)}} </p>

    

    <span class="fw-bold" >Nom de joueur :</span>  

    <p class="card-text">
    @foreach ( $equipe->joueurs as $value)

    |<a href="{{route('joueurs.show',$value->id)}} " style="text-decoration:none; ">{{$value->nom}} </a>|
    
    @endforeach
    </p>

    

    <span class="fw-bold" >Continent :</span>  <p class="card-text">{{$equipe->continent->nom}} </p>
    </div>
</div>


@endsection



{{-- <a href="{{route('equipes.show',$joueur->id)}} " style="text-decoration:none; "><p class="card-text"> {{$joueur->equipe->nom}}</p></a> --}}
