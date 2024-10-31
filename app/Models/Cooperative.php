<?php

namespace App\Models;

use App\Models\Secteur;
use App\Models\LigneCoop;
use App\Models\BureauCoop;

use App\Models\ObjectifCoop;
use App\Models\IndicateurCoop;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cooperative extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'secteur_id',
        'nb_adherant',
        'date_creation',
        'date_fin_activite',
        'type_coop',
        'localite_id',
        'adresse',
        'statut',
    ];

    public function secteur()
    {
        return $this->belongsTo(Secteur::class);
    }
     public function type_coops()
    {
        return $this->belongsTo(TypeCoop::class,'type_coop');
    }
    public function localite()
    {
        return $this->belongsTo(Localite::class);
    }

    public function bureau()
    {
        return $this->hasOne(BureauCoop::class);
    }

    public function indicateurs()
    {
        return $this->hasMany(IndicateurCoop::class);
    }

    public function objectifs()
    {
        return $this->hasMany(ObjectifCoop::class);
    }

    public function ligneCoops()
    {
        return $this->hasMany(LigneCoop::class);
    }
}
