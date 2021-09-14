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

<h1 class="text-center m-3">Creer une equipe</h1>

<form  action="{{ route('equipes.store') }}" method="post">
    @csrf
    <div class="mb-3">
        <label  class="form-label fw-bold">Nom</label>
        <input type="text" class="form-control w-25"  placeholder="nom" name="nom" value="{{ old('nom') }}" >
    </div>
    <div class="mb-3">
        <label  class="form-label fw-bold">Ville</label>
        <input type="text" class="form-control w-25"  name="ville" placeholder="ville" value="{{ old('ville') }}">
    </div>
    <div class="mb-3">
        <label  class="form-label fw-bold">Pays</label>
        <input type="text" class="form-control w-25" name="pays" placeholder="pays" value="{{ old('pays') }}">
    </div>
    <div class="mb-3">
        <label  class="form-label fw-bold">Nombre</label>
        <input type="text" class="form-control w-25" name="nombre"  placeholder="nombre" value="{{ old('nombre') }}">
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