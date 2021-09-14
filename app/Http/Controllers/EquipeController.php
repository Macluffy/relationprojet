<?php

namespace App\Http\Controllers;

use App\Models\Continent;
use App\Models\Equipe;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class EquipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Equipe::all();
        return view('pages.equipes',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Continent::all();
        return view('layoutsE.create',compact('data'));
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
            "nom"=>["required","min:1" , "max:200" ],
            "ville"=>["required","min:1" , "max:200" ],
            "pays"=>["required","min:1" , "max:200" ],
            "nombre"=>["required","min:1" , "max:200" ],
            "continent_id"=>["required","min:1" , "max:200" ],  
        ]);



        $data = new Equipe;
        $data->nom = $request->nom;
        $data->ville = $request->ville;
        $data->pays = $request->pays;
        $data->nombre = $request->nombre;
        $data->continent_id = $request->continent_id;
        $data->save();

        return redirect()->route('equipes.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipe  $equipe
     * @return \Illuminate\Http\Response
     */
    public function show(Equipe $equipe)
    {

        return view('layoutsE.show',compact('equipe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Equipe  $equipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipe $equipe)
    {
        $data = Continent::all();
        return view('layoutsE.edit',compact('equipe','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Equipe  $equipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipe $equipe)
    {
        request()->validate([
            "nom"=>["required", "min:1", "max:200"],
            "ville"=>["required", "min:1", "max:200"],
            "pays"=>["required", "min:1", "max:200"],
            "nombre"=>["required", "min:1", "max:200"],
            "continent_id"=>["required", "min:1", "max:200"],
        ]);
        $equipe->nom = $request->nom;
        $equipe->ville = $request->ville;
        $equipe->pays = $request->pays;
        $equipe->nombre = $request->nombre;
        $equipe->continent_id = $request->continent_id;
        $equipe->save();
        return redirect()->route('equipes.index');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipe  $equipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipe $equipe)
    {
        $equipe->delete();
        return redirect()->route('equipes.index');
    }
}
