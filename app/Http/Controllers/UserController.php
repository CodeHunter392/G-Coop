<?php

namespace App\Http\Controllers;

use App\Models\NFiliere;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\NEtudiant;
use App\Models\NInscription;
use App\Models\User;

class UserController extends Controller
{
    public function index (){
       $filiere = Classe::all();
      dd($filiere);
        return view('test',compact('filiere'));
    }
}
