@extends('template.welcome')

@section('content')

<h1 class="text-center m-5">Joueurs</h1>
<div class="w-100 d-flex justify-content-end">
    <a href="{{ route('joueurs.create') }}" class="btn btn-success m-2 ">Nouveau joueur</a>
</div>

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
        @foreach ($data as $value)
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
            <td>
                <img src="{{$value->photo->nom}}" style="width: 50px;" alt="">
            </td>
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