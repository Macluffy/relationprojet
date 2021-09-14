<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use App\Models\Joueur;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function index() {
        $dataE = Equipe::all();
        
        $dataJ = Joueur::all();
        return view('pages.home',compact('dataE','dataJ'));
    }
}
