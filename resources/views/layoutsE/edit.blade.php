@extends('template.welcome')

@section('content')

@if ($errors->any())
<div class="alert alert-danger" >
    <ul>
        @foreach ($errors->all() as $error )
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    
</div>
@endif

<h1 class="text-center m-3">configuration de l'equipe</h1>

<form  action="{{ route('equipes.update', $equipe->id ) }}" method="post" >
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label  class="form-label fw-bold">Nom</label>
        <input type="text" class="form-control w-25"  placeholder="nom" name="nom" value="{{$equipe->nom}}" >
    </div>
    <div class="mb-3">
        <label  class="form-label fw-bold">Ville</label>
        <input type="text" class="form-control w-25"  name="ville" placeholder="ville" value="{{ $equipe->ville }}">
    </div>
    <div class="mb-3">
        <label  class="form-label fw-bold">Pays</label>
        <input type="text" class="form-control w-25" name="pays" placeholder="pays" value="{{ $equipe->pays}}">
    </div>
    <div class="mb-3">
        <label  class="form-label fw-bold">Nombre</label>
        <input type="text" class="form-control w-25" name="nombre"  placeholder="nombre" value="{{ $equipe->nombre }}">
    </div>
    
    
    <div class="mb-3">
    <label  class="form-label fw-bold">Continent</label>
    <select class="form-select  " style="width: 10%" aria-label="Default select example" name="continent_id">
        
        @foreach ($data as $value)
        <option value="{{$value->id}} ">{{$value->nom}} </option>
        @endforeach
        
    </select>
    
    
</div>




<button type="submit" class="mb-5 btn btn-success" >Create</button>
</form>

@endsection