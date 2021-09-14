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

<h1 class="text-center m-3">Configurer un joueur</h1>

<form  action="{{ route('joueurs.update', $joueur->id ) }}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="mb-3">
        <label  class="form-label fw-bold">Nom</label>
        <input type="text" class="form-control w-25"  placeholder="nom" name="nom" value="{{ $joueur->nom }}" >
    </div>
    
    <div class="mb-3">
        <label  class="form-label fw-bold">Prenom</label>
        <input type="text" class="form-control w-25"  name="prenom" placeholder="prenom" value="{{$joueur->prenom }}">
    </div>
    <div class="mb-3">
        <label  class="form-label fw-bold">Age</label>
        <input type="text" class="form-control w-25" name="age" placeholder="age" value="{{$joueur->age }}">
    </div>
    <div class="mb-3">
        <label  class="form-label fw-bold">Telephone</label>
        <input type="text" class="form-control w-25" name="telephone"  placeholder="telephone" value="{{$joueur->telephone }}">
    </div>
    
    <div class="mb-3">
        <label  class="form-label fw-bold">Email</label>
        <input type="email" class="form-control w-25" name="email"  placeholder="email" value="{{$joueur->email }}">
    </div>

    <div class="mb-3">
        <label  class="form-label fw-bold">Pays</label>
        <input type="text" class="form-control w-25" name="pays"  placeholder="pays" value="{{$joueur->pays }}">
    </div>

    <div class="mb-3">
        <label  class="form-label fw-bold">Genre</label>
        <div class="d-flex">
            <div class="form-check m-2">
            <input class="form-check-input" type="radio" value="male" id="flexCheckDefault" name="genre">
            <label class="form-check-label" for="flexCheckDefault">
                male
            </label>
        </div>
        <div class="form-check m-2">
            <input class="form-check-input" type="radio" value="female" id="flexCheckChecked"  name="genre">
            <label class="form-check-label" for="flexCheckChecked">
                female
            </label>
        </div>
        </div>
        
    </div>

    

    
    
    <div class="mb-3">
        <label  class="form-label fw-bold">Photo</label>
        <input type="file" class="form-control w-25" name="image"  placeholder="image" value="{{ $joueur->photo->nom }}">
    </div>

    <div class="mb-3">
        <label  class="form-label fw-bold">Role</label>
        <select class="form-select  " style="width: 10%" aria-label="Default select example" name="role_id">
            
            @foreach ($dataR as $value)
            <option value="{{$value->id}} ">{{$value->nom}} </option>
            @endforeach
            
        </select>

        <div class="mb-3">
            <label  class="form-label fw-bold">Equipe</label>
            <select class="form-select  " style="width: 10%" aria-label="Default select example" name="equipe_id">
                
                @foreach ($dataE as $value)
                <option value="{{$value->id}} ">{{$value->nom}} </option>
                @endforeach
                <option value="">pas d'equipe </option>
                
            </select>


    
    
</div>




<button type="submit" class="mb-5 btn btn-success" >Create</button>
</form>

@endsection

