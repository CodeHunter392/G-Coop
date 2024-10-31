<?php

use App\Models\Prof;
use App\Models\User;
use App\Models\Stage;
use App\Models\Secteur;
use Livewire\Component;
use App\Models\Objectif;
use App\Models\TypeCoop;
use App\Models\NEtudiant;
use App\Models\Organisme;
use App\Models\OffreStage;
use Illuminate\Support\Str;
use App\Models\NInscription;
use Illuminate\Support\Facades\DB;
define("PAGELIST","liste");

define("PAGECREATEFORM","create");
define("PAGEEDITFORM","edit");
define("DEFAULTPASSWORD","password");
function setMenuActive($route){
    $routeActuel=request()->route()->getName();
    if($routeActuel === $route){
        return "active";
    }
    else "";

}
function contains($container,$contenu){
    return Str::contains($container,$contenu);
}
function setMenuClass($route,$classe){
    $routeActuel=request()->route()->getName();
    if(contains($routeActuel, $route)){
        return $classe;
    }
    else "";

}
function showTypeName($typeid){
    $typenom=TypeCoop::find($typeid);
    return "$typenom->nom";
}
function showSecteurName($secteurid){
    $secteurnom=Secteur::find($secteurid);
    return "$secteurnom->nom";
}
function findUserEmail($user_id){
    $usernom=User::find($user_id);
    return "$usernom->email";
}
function nameObjectif($id){
    $objectif = Objectif::find($id);
    return "$objectif->nom";
}
function showOrganismeName($id){
    $organisme=Organisme::find($id);
    return "$organisme->nom";

}

