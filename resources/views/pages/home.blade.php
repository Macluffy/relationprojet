@extends('template.welcome')



@section('content')
<h1 class="text-center m-3">Home</h1>

{{-- Equipe remplie --}}

<h3 class=" m-3">Equipes remplie</h3>
<table class="table">
    <thead class="table-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col">Ville</th>
            <th scope="col">Pays</th>
            <th scope="col">Nombre de joueur</th>
            <th scope="col">Continent</th>
            <th scope="col">Button</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dataE as $value)
        
        @if (count($value->joueurs) == $value->nombre)
        
        <tr>
            <th scope="row">{{$value->id}} </th>
            <td>{{$value->nom}} </td>
            <td>{{$value->ville}} </td>
            <td>{{$value->pays}} </td>
            <td>{{count($value->joueurs)}} /{{$value->nombre}} </td>
            <td>{{$value->continent->nom}} </td>
            <td class="d-flex">
                <a href="{{route('equipes.edit',$value->id)}} "><button class="btn btn-warning m-1">EDIT</button></a>
                <a href="{{route('equipes.show',$value->id)}} "><button class="btn btn-primary m-1">SHOW</button></a>
                <form action="{{route('equipes.destroy',$value->id)}} " method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger m-1">DELETTE</button>
                </form>
            </td>
        </tr>
        
        @endif
        @endforeach
        
    </tbody>
</table>

{{-- Equipes non remplie --}}

<h3 class=" m-3">Equipes non remplie</h3>
<table class="table">
    <thead class="table-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col">Ville</th>
            <th scope="col">Pays</th>
            <th scope="col">Nombre de joueur</th>
            <th scope="col">Continent</th>
            <th scope="col">Button</th>
        </tr>
    </thead>
    <tbody>
        
        @php
            $a = 0;
        @endphp

        @foreach ($dataE as $value)
        
        @if (count($value->joueurs) < $value->nombre && $a < 2)
        @php
            $a++;
        @endphp
        <tr>
            <th scope="row">{{$value->id}} </th>
            <td>{{$value->nom}} </td>
            <td>{{$value->ville}} </td>
            <td>{{$value->pays}} </td>
            <td>{{count($value->joueurs)}} /{{$value->nombre}} </td>
            <td>{{$value->continent->nom}} </td>
            <td class="d-flex">
                <a href="{{route('equipes.edit',$value->id)}} "><button class="btn btn-warning m-1">EDIT</button></a>
                <a href="{{route('equipes.show',$value->id)}} "><button class="btn btn-primary m-1">SHOW</button></a>
                <form action="{{route('equipes.destroy',$value->id)}} " method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger m-1">DELETTE</button>
                </form>
            </td>
        </tr>
        
        @endif
        @endforeach
        
    </tbody>
</table>


<h3 class=" m-3">4 joueur sans equipe au hasard </h3>
<table class="table">
    <thead class="table-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col">Prenom</th>
            <th scope="col">Age</th>
            <th scope="col">Telephone</th>
            <th scope="col">Email</th>
            <th scope="col">Genre</th>
            <th scope="col">Pays</th>
            <th scope="col">Role</th>
            <th scope="col">Equipe</th>
            <th scope="col">Photo</th>
            <th scope="col">Button</th>


        </tr>
    </thead>
    <tbody>
        @foreach ($dataJ as $value)
        {{-- @if ($value->)
            
        @endif --}}
        <tr>
            <th scope="row">{{$value->id}} </th>
            <td>{{$value->nom}} </td>
            <td>{{$value->prenom}} </td>
            <td>{{$value->age}} </td>
            <td>{{$value->telephone}} </td>
            <td>{{$value->email}} </td>
            <td>{{$value->genre}} </td>
            <td>{{$value->pays}} </td>
            <td>{{$value->role->nom}} </td>
            <td>{{$value->equipe->nom}} </td>
            
            @if (Storage::disk('public')->exists('img/' . $value->photo->nom))
            <td><img style="width: 40px" src="{{ asset('img/' . $value->photo->nom) }}" alt=""></td>
            @else
            <td><img style="width: 40px" src="{{ $value->photo->nom }}" alt=""></td>
            @endif
            <td class="d-flex">
                <a href="{{route('joueurs.edit',$value->id)}} "><button class="btn btn-warning m-1">EDIT</button></a>
                <a href="{{route('joueurs.show',$value->id)}} "><button class="btn btn-primary m-1">SHOW</button></a>
                <form action="{{route('joueurs.destroy',$value->id)}} " method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger m-1">DELETTE</button>
                </form>
            </td>
        </tr>
        @endforeach
        
    </tbody>
</table>








@endsection