@extends('template.welcome')

@section('content')

<h1 class="text-center m-3">Equipes</h1>
<div class="w-100 d-flex justify-content-end">
    <a href="{{ route('equipes.create') }}" class="btn btn-success m-2 ">Creer une equipes</a>

</div>


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
        @foreach ($data as $value)
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
        @endforeach
        
    </tbody>
</table>

@endsection