<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use App\Models\Joueur;
use App\Models\Photo;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class JoueurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Joueur::all();
        return view('pages.joueurs',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataP=Photo::all();
        $dataR=Role::all();
        $dataE=Equipe::all();
        return view('layoutsJ.create',compact('dataP','dataR','dataE'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            "nom"=>["required","min:1","max:200"],
            "prenom"=>["required","min:1","max:200"],
            "age"=>["required","min:1","max:200"],
            "telephone"=>["required","min:1","max:200"],
            "email"=>["required","min:1","max:200"],
            "genre"=>["required","min:1","max:200"],
            "pays"=>["required","min:1","max:200"],
            "role_id"=>["required","min:1","max:200"],
            "equipe_id"=>["required","min:1","max:200"],
        ]);
        $data = new Joueur;
        $data->nom = $request->nom;
        $data->prenom = $request->prenom;
        $data->age = $request->age;
        $data->telephone = $request->telephone;
        $data->email = $request->email;
        $data->genre = $request->genre;
        $data->pays = $request->pays;
        $data->role_id = $request->role_id;
        $data->equipe_id = $request->equipe_id;
        $data->save();
        $photo = new Photo;
        $photo->nom = $request->file('image')->hashName();
        $photo->joueur_id = $data->id;
        $photo->save();
        $request->file('image')->storePublicly('img','public');
        return redirect()->route('joueurs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Joueur  $joueur
     * @return \Illuminate\Http\Response
     */
    public function show(Joueur $joueur)
    {
        return view('layoutsJ.show',compact('joueur'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Joueur  $joueur
     * @return \Illuminate\Http\Response
     */
    public function edit(Joueur $joueur)
    {
        $dataP=Photo::all();
        $dataR=Role::all();
        $dataE=Equipe::all();
        return view('layoutsJ.edit',compact('joueur','dataP','dataR','dataE',));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Joueur  $joueur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Joueur $joueur)
    {
        request()->validate([
            "nom"=>["required","min:1","max:200"],
            "prenom"=>["required","min:1","max:200"],
            "age"=>["required","min:1","max:200"],
            "telephone"=>["required","min:1","max:200"],
            "email"=>["required","min:1","max:200"],
            "genre"=>["required","min:1","max:200"],
            "pays"=>["required","min:1","max:200"],
            "role_id"=>["required","min:1","max:200"],
            "equipe_id"=>["required","min:1","max:200"],
        ]);

        
        $joueur->nom = $request->nom;
        $joueur->prenom = $request->prenom;
        $joueur->age = $request->age;
        $joueur->telephone = $request->telephone;
        $joueur->email = $request->email;
        $joueur->genre = $request->genre;
        $joueur->pays = $request->pays;
        $joueur->role_id = $request->role_id;
        $joueur->equipe_id = $request->equipe_id;
        $joueur->save();

        return redirect()->route('joueurs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Joueur  $joueur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Joueur $joueur)
    {
        $joueur->delete();
        return redirect()->route('joueurs.index');

    }
}
